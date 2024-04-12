<?php

namespace App\Classes\DateClass;


class monthName
{

    public $month;
    public $array;

    function __construct($date)
    {
        $this->month = intval(date('m', strtotime($date)));
        $this->array = ["január", "február", "március", "április", "május", "június", "július", "augusztus", "szeptember", "október", "november", "december"];
    }

    public function monthName(): string
    {
        return $this->array[$this->month - 1];
    }
}
