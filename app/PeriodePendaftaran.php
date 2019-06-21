<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodePendaftaran extends Model
{
    protected $table = 'periode_pendaftaran';
    protected $primary_key = 'id';
    protected $fillable = [
        'start','end',
    ];
}
