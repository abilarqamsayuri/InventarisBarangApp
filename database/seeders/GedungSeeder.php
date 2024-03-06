<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini adalah isi table dari create_gedung_table
        DB::table('gedung')->insert(
            [
                [
                    'nama' => 'Gedung 1',
                    'jumlah' => '',
                    'inventaris_id' => 1,
                    'inventaris_kategori_id' => 1,
                ],
            ]
        );
    }
}
