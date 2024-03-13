<?php
class Person {
    private $birthDate;

    public function __construct($birthDate) {
        try {
            $this->birthDate = new DateTime($birthDate);
        } catch (Exception $e) {
            throw new InvalidArgumentException();
        }
    }

    public function getAge() {
        $now = new DateTime();
        $interval = $now->diff($this->birthDate);
        return $interval->format('%y years, %m months, %d days');
    }
}

$person = new Person('1990-10-15');
echo $person->getAge();
