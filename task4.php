<?php
class LetterCounter {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function countLetters() {
        $counts = count_chars(strtolower($this->text), 1);
        foreach ($counts as $i => $val) {
            echo '"' , chr($i) , '" appears ', $val, " time(s)\n";
        }
    }
}

$counter = new LetterCounter('HELLO WORLD');
$counter->countLetters();
