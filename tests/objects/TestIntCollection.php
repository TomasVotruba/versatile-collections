<?php

/**
 * Description of TestIntsCollection
 *
 * @author Rotimi Ade
 */
class TestIntsCollection extends \VersatileCollections\IntsCollection {

    public function getItemFromString($str) {
        
        return $this->itemFromString($str);
    }

    public function getItemAsString($item) {
        
        return $this->itemToString($item);
    }
}
