<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Peserta extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'peserta';
    protected $primary_key = 'id';
    protected $fillable = [
        'kode_invoice','paket','user_id','prodi_id','nim','nama','no_telp','nama_ortu','no_telp_ortu','penyakit_bawaan','vegetarian','agama_id','jenis_kelamin','tanggal_daftar','biaya_pendaftaran','total','bukti_pembayaran','status','surat_keterangan_sehat',
    ];

    public function detail_peserta()
    {
        return $this->hasMany('App\DetailPeserta');
    }
    
    public function prodi()
    {
        return $this->belongsTo('App\Prodi','prodi_id');
    }

    public function agama()
    {
        return $this->belongsTo('App\Agama','agama_id');
    }
}
