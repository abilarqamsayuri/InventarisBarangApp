<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini adalah isi table dari create_kategory_table
        DB::table('kategory')->insert(
            [
                [
                    'nama' => 'Elektronik'
                ],
                [
                    'nama' => 'Perabotan'
                ],
            ]
        );
    }
}
