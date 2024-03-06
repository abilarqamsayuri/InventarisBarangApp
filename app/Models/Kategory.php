<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategory extends Model
{
    use HasFactory;
    // kode untuk mapping ke tabel kategory
    protected $table = 'kategory';
}
