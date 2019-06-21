<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primary_key = 'id';
    protected $fillable = [
        'jenis_media_id','path','tahun',
    ];

    public function jenis_media()
    {
        return $this->belongsTo('App\JenisMedia','jenis_media_id');
    }
}
