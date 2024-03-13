<?php
class DirectorySizeCalculator {
    private $dir;

    public function __construct($dir) {
        $this->dir = $dir;
    }

    public function calculateSize() {
        $size = 0;
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->dir)) as $file) {
            $size += $file->getSize();
        }
        return $size;
    }
}

$calculator = new DirectorySizeCalculator('.');
echo $calculator->calculateSize() . "     bytes";
