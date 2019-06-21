<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisMedia extends Model
{
    protected $table = 'jenis_media';
    protected $primary_key = 'id';
    protected $fillable = [
        'jenis_media',
    ];

    public function media()
    {
        return $this->hasMany('App\Media');
    }
}
