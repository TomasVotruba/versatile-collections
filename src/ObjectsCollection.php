<?php
namespace VersatileCollections;

/**
 * Description of ObjectsCollection
 *
 * @author aadegbam
 */
class ObjectsCollection implements \VersatileCollections\StrictlyTypedCollectionInterface {
    
    use StrictlyTypedCollectionInterfaceImplementationTrait;
    
    /**
     * 
     * Call a method on each object in the collection.
     * 
     * The return value of each call (if any) is stored in an array keyed 
     * on the object's key in the collection and this array is returned.
     * 
     * @param string $method_name
     * @param array $arguments
     * 
     * @used-for: other-operations
     * 
     * @title: Tries to call the specified method with the specified arguments and return its return value if it was registered via either `addMethod` or `addMethodForAllInstances` or tries to call the specified method with the specified arguments on each item in the collection and returns an array of return values keyed by each item's key in the collection. An exception of type **\VersatileCollections\Exceptions\InvalidCollectionOperationException** is thrown if the method could not be called.
     * 
     * @throws \Exception
     * 
     */
    public function __call($method_name, $arguments) {

        try {
            $result = static::parent__call($method_name, $arguments);
            
            return $result;
            
        } catch (\Exception $ex) {

            $results = [];

            foreach ( $this as $key_in_collection => $object ) {

                try {

                    if( count($arguments) <= 0 ) {

                        $arguments = [];
                    }

                    $results[$key_in_collection] =
                        call_user_func_array([$object, $method_name], $arguments);

                } catch (\Exception $exc) {

                    $class = get_class($this);
                    $function = __FUNCTION__;
                    $msg = "Error [{$class}::{$function}(...)]:Trying to call a"
                        . " method named `$method_name` on a collection item with key `{$key_in_collection}` of type "
                        . "`". gettype($object)."` "
                        . PHP_EOL . " `\$arguments`: " . var_to_string($arguments)
                        . PHP_EOL . " `Original Exception Message`: " . $exc->getMessage();

                    throw new Exceptions\InvalidCollectionOperationException($msg);
                }
            } // foreach ( $this as $key_in_collection => $object )

            return $results;
        }
    }
    
    public function checkType($item) {
        
        return is_object($item);
    }
    
    public function getType() {
        
        return 'object';
    }
}
