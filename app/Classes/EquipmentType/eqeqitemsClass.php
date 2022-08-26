<?php

namespace App\Classes\EquipmentType;

use App\Models\Eqeqitems;
use App\Models\Eqitems;

class eqeqitemsClass
{

    public $equipmenttypes_id;

    function __construct($equipmenttypes_id) {
        $this->equipmenttypes_id = $equipmenttypes_id;
    }

    public function makeItems() {
        $eqeqitems = Eqeqitems::where('equipmenttypes_id', $this->equipmenttypes_id)->get();
        if ($eqeqitems->count() === 0) {
            $eqitems = Eqitems::all();
            foreach ($eqitems as $eqitem) {
                Eqeqitems::create([
                    'equipmenttypes_id' => $this->equipmenttypes_id,
                    'eqitems_id' => $eqitem->id
                ]);
            }
        }
    }
}
