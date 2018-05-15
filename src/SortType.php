<?php
namespace VersatileCollections;

/**
 * Description of SortParameters
 *
 * @author aadegbam
 */
class SortType {

    protected $sort_type = SORT_REGULAR;
    
    protected static $valid_sort_types = [
        SORT_REGULAR, SORT_NATURAL, SORT_NUMERIC, SORT_STRING, SORT_LOCALE_STRING,
        SORT_FLAG_CASE, (SORT_FLAG_CASE | SORT_STRING), (SORT_FLAG_CASE | SORT_NATURAL)
    ];
    
    public function __construct($sort_type=null) {
        
        if( in_array($sort_type, static::$valid_sort_types, true) ) {
            
            $this->sort_type = $sort_type;
            
        } else if( 
            !in_array($sort_type, static::$valid_sort_types, true) 
            && !is_null($sort_type)
        ) {
            $class = get_class($this);
            $function = __FUNCTION__;
            $msg = "Error [{$class}::{$function}(...)]:Invalid \$sort_type supplied to "
                . "`{$class}::{$function}(...)` "
                . PHP_EOL . " `\$sort_type`: " . var_export($sort_type, true);
            
            throw new Exceptions\InvalidSortType($msg);
        }
    }

    public function getSortType() {
        
        return $this->sort_type;
    }

    public function setSortType($sort_type) {
        
        $this->sort_type = $sort_type;
        
        return $this;
    }

    public static function getValidSortTypes() {
        
        return static::$valid_sort_types;
    }
}
