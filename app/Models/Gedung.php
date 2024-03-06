<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gedung extends Model
{
    use HasFactory;
    // kode untuk mapping ke tabel gedung
    protected $table = 'gedung';
}
