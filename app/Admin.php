<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use App\AdminNotification;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;
// The authentication guard for admin
    protected $guard = 'admin';
    protected $table = 'admin';
    protected $fillable = [
        'username','password','nama','jabatan_id','status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notifications()
    {
        return $this->morphMany(AdminNotification::class, 'notifiable')
                    ->orderBy('created_at', 'desc');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan','jabatan_id');
    }
}
