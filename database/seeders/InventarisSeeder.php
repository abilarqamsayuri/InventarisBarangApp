<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini adalah isi table dari create_inventaris_table
        DB::table('inventaris')->insert(
            [
                'nama_barang'=>'Monitor HP', 
                'kategory_id'=>1,
                'jumlah'=>16, 
                'harga'=>300000,
                'kondisi'=>'baru',
            ]
        );
    }
}
