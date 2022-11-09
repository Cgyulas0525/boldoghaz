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

    public function childs($table, $id) {
        $model_name = 'App\Models\\'.$table;
        $datas = $model_name::where('parent_id', $id)->orderBy('id')->get();
        foreach ($datas as $data) {
            $name = $this->recordFullName($table, $data->parent_id, $data->name);
            $arrayItem = ["id" => $data->id, "name" => $name, "commit" => $data->commit, "parent_id" => $data->parent_id, "childCount" => $data->childs()->count()];
            array_push($this->array, $arrayItem);
            $this->childs($table, $data->id);
        }
    }

    public function selectData($table) {
        $model_name = 'App\Models\\'.$table;
        $datas = $model_name::whereNull('parent_id')->orderBy('id')->get();
        foreach ($datas as $data) {
            $arrayItem = ["id" => $data->id, "name" => $data->name, "commit" => $data->commit, "parent_id" => $data->parent_id, "childCount" => $data->childs()->count()];
            array_push($this->array, $arrayItem);
            $this->childs($table, $data->id);
        }
        return $this->array;
    }

    public function recordFullName($table, $id, $name) {
        $model_name = 'App\Models\\'.$table;
        $item = $model_name::find($id);
        $fullName = $item->name . " - " . $name;
        if (!is_null($item->parent_id)) {
            $fullName = $this->recordFullName($table, $item->parent_id, $fullName);
        }
        return $fullName;
    }

}
