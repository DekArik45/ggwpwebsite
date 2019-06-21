<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $primary_key = 'id';
    protected $fillable = [
        'jenis_fasilitas','fasilitas',
    ];
}
