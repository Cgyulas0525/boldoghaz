<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\SWAlertClass;

class DestroysController extends Controller
{
    public function beforeDestroys($table, $id, $route) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztos, hogy törli a tételt?', '/'.$route, 'Kilép', '/destroy/'.$table.'/'.$id.'/'.$route, 'Töröl');

        return view($view)->with('table', $data);
    }


    public function destroy($table, $id, $route) {
        $route .= '.index';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);

        if (empty($data)) {
            return redirect(route($route));
        }

        $data->delete();

        return redirect(route($route));
    }
}
