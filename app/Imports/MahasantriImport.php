<?php

namespace App\Imports;

use App\Models\Mahasantri;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasantriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasantri([
            //
        ]);
    }
}
