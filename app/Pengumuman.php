<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primary_key = 'id';
    protected $fillable = [
        'image','judul','content','tanggal','admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
