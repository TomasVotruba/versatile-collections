<?php
namespace VersatileCollections;

/**
 * Description of IntCollection
 *
 * @author rotimi
 */
class IntCollection extends ScalarCollection {

    protected function checkType($item) {
        
        return is_int($item);
    }

    protected function getType() {
        
        return 'int';
    }
}
