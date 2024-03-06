<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class InventarisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_inv = DB::table('inventaris as inv')
            ->join('kategory', 'kategory.id', '=', 'inv.kategory_id')
            ->select('inv.*','kategory.nama AS kat')->get();
        return $ar_inv;
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Kategori',
            'Jumlah',
            'Harga',
            'Kondisi',
        ];
    }
}
