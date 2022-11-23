<?php

namespace App\Classes\Contract;

use DB;

class contractChild
{

    public function allRecords($table, $id) {
        $contractcontenttypes = DB::table($table . 'types')->get();
        foreach ($contractcontenttypes as $contractcontenttype) {
            $ccData = DB::table($table)->where('contract_id', $id)->where($table . 'types_id', $contractcontenttype->id)->first();
            if (empty($ccData)) {
                DB::table($table)
                    ->insert([
                        'contract_id' => $id,
                        $table . 'types_id' => $contractcontenttype->id,
                        'created_at' => \Carbon\Carbon::now()
                    ]);
            } else {
                if (!is_null($ccData->deleted_at)) {
                    DB::table($table)->where('contract_id', $id)->where($table . 'types_id', $contractcontenttype->id)
                        ->update([
                            'deleted_at' => NULL
                        ]);
                }
            }
        }
    }

}
