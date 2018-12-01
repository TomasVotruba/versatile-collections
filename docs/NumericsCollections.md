# Numeric Collection

`\VersatileCollections\NumericsCollection` is a Collection class that only accepts
items that are either floats or integers.

Example Usage:

```php
    
    $collection = new \VersatileCollections\NumericsCollection(
        1, 2, 3, 4.0, 5.9, 6.7, 7.9
    );

    // OR
    
    $collection = \VersatileCollections\NumericsCollection::makeNew(
        [1, 2, 3, 4.0, 5.9, 6.7, 7.9]
    );

    // OR

    $collection = new \VersatileCollections\NumericsCollection();
    $collection[] = 4;
    $collection[] = 5;
    $collection[] = 7.877;
    $collection[] = 9.576;
```

A good use-case for this type of collection would be in applications that require
a list of strictly numeric values (integers or floating point numbers) 
for some calculation.

See [here](MethodDescriptions.md#VersatileCollections-NumericsCollection) for methods 
specific to this Collection class and its descendants.
