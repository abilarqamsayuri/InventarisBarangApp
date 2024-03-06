<?php

namespace App\Imports;

use App\Models\Pengarang;
use Maatwebsite\Excel\Concerns\ToModel;

class PengarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengarang([
            //
        ]);
    }
}
