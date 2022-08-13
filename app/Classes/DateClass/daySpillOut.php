<?php

namespace App\Classes\DateClass;

use App\Classes\DateClass\dayName;
use App\Classes\DateClass\monthName;

class daySpillOut {

    public $day;
    public $dn;
    public $mn;

    function __construct($date) {
        $this->day = $date;
        $this->mn = new monthName($date);
        $this->dn = new dayName($date);
    }

    /**
     * @return string
     */
    public function daySplill() : string
    {
        return date('Y', strtotime(now())) . "." . $this->mn->monthName() . "." . date('d', strtotime(now()));
    }

    public function daySpillDay() : string
    {
        return date('Y', strtotime(now())) . "." . $this->mn->monthName() . "." . date('d', strtotime(now())) . " " . $this->dn->dayName();
    }
}
