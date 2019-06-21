<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';
    protected $primary_key = 'id';
    protected $fillable = [
        'nama_agama',
    ];

    public function peserta()
    {
        return $this->hasMany('App\Peserta');
    }
}
