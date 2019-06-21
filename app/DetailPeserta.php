<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPeserta extends Model
{
    protected $table = 'detail_peserta';
    protected $primary_key = 'id';
    protected $fillable = [
        'peserta_id','ukuran_baju','qty','harga','sub_total',
    ];


    public function peserta()
    {
        return $this->belongsTo('App\Peserta');
    }
}
