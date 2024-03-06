<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_user = DB::table('users')
            ->select('users.*')->get();
        return $ar_user;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Password',
            'Role',
        ];
    }
}
