<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primary_key = 'id';
    protected $fillable = [
        'nama_jabatan',
    ];

    public function admin()
    {
        return $this->hasMany('App\Admin');
    }
}
