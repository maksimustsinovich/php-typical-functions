<?php
class ArrayFlattener {
    private $array;

    public function __construct($array) {
        $this->array = $array;
    }

    public function flatten() {
        $flattened = [];
        array_walk_recursive($this->array, function($value) use (&$flattened) {
            $flattened[] = $value;
        });
        return array_unique($flattened);
    }
}

$flattener = new ArrayFlattener([[1, 2, 3], [2, 3, 4], [4, 5, 6]]);
print_r($flattener->flatten());
