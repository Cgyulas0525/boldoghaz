<?php

namespace App\Classes\EnergyClassification;

use App\Models\Ececitems;
use App\Models\Ecitems;

class ececitemsClass {

    public $energyClassification_id;

    function __construct($energyClassification_id) {
        $this->energyClassification_id = $energyClassification_id;
    }

    public function makeItems(){
        $ececitems = Ececitems::where('energyclassifications_id', $this->energyClassification_id)->get();
        if ($ececitems->count() === 0) {
            $ecitems = Ecitems::all();
            foreach ($ecitems as $ecitem) {
                Ececitems::create([
                   'energyclassifications_id' => $this->energyClassification_id,
                   'ecitems_id' => $ecitem->id
                ]);
            }
        }
    }
}
