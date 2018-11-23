<?php
/**
 * Description of SortTypeTest
 *
 * @author aadegbam
 */
class SortTypeTest extends \PHPUnit\Framework\TestCase {
    
    protected function setUp() { 
        
        parent::setUp();
    }
    
    /**
     * @expectedException \VersatileCollections\Exceptions\InvalidSortType
     */
    public function testThatConstructorWithInvalidSortTypeWorksAsExpected() {
        
        $sort_type = new \VersatileCollections\SortType('');
    }
    
    /**
     * @expectedException \VersatileCollections\Exceptions\InvalidSortType
     */
    public function testThatConstructorWithInvalidSortTypeWorksAsExpected2() {
        
        $sort_type = new \VersatileCollections\SortType([]);
    }

    public function testThatConstructorWithValidSortTypeWorksAsExpected() {
        
        $sort_type = new \VersatileCollections\SortType();

        $this->assertTrue($sort_type->getSortType() === SORT_REGULAR);
        $this->assertTrue(
            in_array($sort_type->getSortType(), 
            \VersatileCollections\SortType::getValidSortTypes())
        );
        
        $sort_type = new \VersatileCollections\SortType(SORT_NATURAL);
        $this->assertTrue($sort_type->getSortType() === SORT_NATURAL);
        $this->assertTrue(in_array($sort_type->getSortType(), \VersatileCollections\SortType::getValidSortTypes()));
    }

    public function testThatGettersWorkAsExpected() {
        
        $sort_param = new \VersatileCollections\SortType(SORT_LOCALE_STRING);
        $this->assertTrue($sort_param->getSortType() === SORT_LOCALE_STRING);
        
        $sort_param = new \VersatileCollections\SortType(SORT_NUMERIC);
        $this->assertTrue($sort_param->getSortType() === SORT_NUMERIC);
    }

    /**
     * @expectedException \VersatileCollections\Exceptions\InvalidSortType
     */
    public function testThatSettersWorkAsExpected() {
        
        $sort_param = new \VersatileCollections\SortType(SORT_LOCALE_STRING);
        $this->assertTrue($sort_param->getSortType() === SORT_LOCALE_STRING);
        
        $sort_param->setSortType(SORT_NUMERIC);
        $this->assertTrue($sort_param->getSortType() === SORT_NUMERIC);
        
        $sort_param->setSortType('Invalid Sort Type');
    }
}
