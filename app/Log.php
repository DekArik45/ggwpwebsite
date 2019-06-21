<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $primary_key = 'id';
    protected $fillable = [
        'peserta_id','konten','tanggal',
    ];
}
