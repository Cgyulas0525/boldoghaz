<?php

namespace App\Classes\DateClass;

class dayName {

    public $day;
    public $dayName;
    public $array;

    function __construct($date) {
        $this->day = intval(date('w', strtotime($date)));
        $this->array = ["Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat"];
    }

    public function dayName() : string
    {
        return $this->array[$this->day];
    }
}
