<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perpustakaan extends Model
{
    protected $fillable = [
        
        'judul',
        'penerbit',
        'tahun_terbit',
        'pengarang'
    ];//
}
