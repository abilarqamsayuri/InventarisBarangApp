<?php

namespace App\Exports;

use App\Models\Kategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class KategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Kategori::all();
        $ar_kat = DB::table('kategory')->get();

        return $ar_kat;
    }
    public function headings(): array
    {
        return [
            'Nama',
        ];
    }
}
