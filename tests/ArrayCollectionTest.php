<?php
/**
 * Description of ArrayCollectionTest
 *
 * @author aadegbam
 */
class ArrayCollectionTest extends \PHPUnit_Framework_TestCase {
    
    protected function setUp() { 
        
        parent::setUp();
    }
    
    /**
     * @expectedException \VersatileCollections\Exceptions\InvalidItemException
     */
    public function testThatOnlyArraysCanBeInjectedIntoCollection() {
        
        $collection = new \VersatileCollections\ArrayCollection();
        
        $this->assertEquals($collection->count(), 0);
        
        // lines below should produce no exception since we are injecting arrays
        $collection->item1 = ['boo'];
        $collection->item2 = ['strtolower'];
        $collection->item3 = ['a'=>\DateTime::class, 'b'=>'getLastErrors'];
        $collection->item4 = [\DateTime::class, 'createFromFormat'];
        
        $collection = new \VersatileCollections\ArrayCollection(
            ['boo'],
            ['strtolower'],
            ['a'=>\DateTime::class, 'b'=>'getLastErrors'],
            [\DateTime::class, 'createFromFormat']
        );
        
        $this->assertEquals($collection->count(), 4);
        
        // line below should produce an exception since we are injecting
        // a non-array
        $collection->item5 = 'non-array';
    }
}
