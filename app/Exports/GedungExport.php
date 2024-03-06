<?php

namespace App\Exports;

use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class GedungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_gedung = DB::table('gedung as gd')
            ->join('inventaris', 'inventaris.id', '=', 'gd.inventaris_id')
            ->join('kategory', 'kategory.id', '=', 'gd.inventaris_kategori_id')
            ->select('gd.*','kategory.nama AS kategori','inventaris.nama_barang AS inventaris')->get();
        return $ar_gedung;
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Jumlah',
            'Inventaris',
            'Kategori',
        ];
    }
}
