<?php

namespace App\Classes;

use App\Models\Partnertypes;

class ptClass
{
    public $array = [];

    public function fullName($id, $name) {
        $item = Partnertypes::find($id);
        $fullName = $item->name . " - " . $name;
        if (!is_null($item->parent_id)) {
            $fullName = $this->fullName($item->parent_id, $fullName);
        }
        return $fullName;
    }

    public function childs($id) {
        $datas = Partnertypes::where('parent_id', $id)->orderBy('id')->get();
        foreach ($datas as $data) {
            $childCount = Partnertypes::where('parent_id', $data->id)->get()->count();
            $name = $this->fullName($data->parent_id, $data->name);
            $arrayItem = ["id" => $data->id, "name" => $name, "commit" => $data->commit, "parent_id" => $data->parent_id, "childCount" => $childCount];
            array_push($this->array, $arrayItem);
            $this->childs($data->id);
        }
    }

    public function selectData() {
        $datas = Partnertypes::whereNull('parent_id')->orderBy('id')->get();
        foreach ($datas as $data) {
            $childCount = Partnertypes::where('parent_id', $data->id)->get()->count();
            $arrayItem = ["id" => $data->id, "name" => $data->name, "commit" => $data->commit, "parent_id" => $data->parent_id, "childCount" => $childCount];
            array_push($this->array, $arrayItem);
            $this->childs($data->id);
        }
        return $this->array;
    }
}
