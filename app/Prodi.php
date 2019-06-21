<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $primary_key = 'id';
    protected $fillable = [
        'nama_prodi',
    ];

    public function peserta()
    {
        return $this->hasMany('App\Peserta');
    }
}
