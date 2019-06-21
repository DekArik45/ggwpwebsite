<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiTBTN extends Model
{
    protected $table = 'informasi_tbtn';
    protected $primary_key = 'id';
    protected $fillable = [
        'lokasi_tbtn','langitude','longitude','tahun',
    ];
}
