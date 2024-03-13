<?php
class DirectoryAnalyzer {
    private $dir;

    public function __construct($dir) {
        $this->dir = $dir;
    }

    public function findDuplicates() {
        $files = [];
        $duplicates = [];

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->dir)) as $file) {
            if ($file->isFile()) {
                $hash = md5_file($file->getPathname());
                if (isset($files[$hash])) {
                    $duplicates[] = $file->getPathname();
                } else {
                    $files[$hash] = $file->getPathname();
                }
            }
        }

        return $duplicates;
    }
}

$analyzer = new DirectoryAnalyzer('.');
print_r($analyzer->findDuplicates());
