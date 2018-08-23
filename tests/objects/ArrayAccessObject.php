<?php
/**
 * 
 * Description of ArrayAccessObject
 *
 * @author aadegbam
 */
class ArrayAccessObject implements \ArrayAccess {
    
    private $container = [];

    public function __construct(array $array=[]) { 
        
        $this->container = $array;
    }

    public function offsetSet($offset, $value) {
        
        if (is_null($offset)) {
            
            $this->container[] = $value;
            
        } else {
            
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        
        return array_key_exists($offset, $this->container);
    }

    public function offsetUnset($offset) {
        
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        
        if( $this->offsetExists($offset) ) {
            
            return $this->container[$offset];
        }
        
        throw new Exception( 
            "Error in ".__METHOD__.": Offset `"
            . \VersatileCollections\VersatileCollections\var_to_string($offset)
            ."` does not exist."
        );
    }
}
