<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table = 'contact_person';
    protected $primary_key = 'id';
    protected $fillable = [
        'nama','idline','no_telp','email','tahun','jabatan_id','informasi_tbtn_id',
    ];
}
