<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminNotification extends Model
{
    use Notifiable;
    protected $table = 'notifications';
    protected $guarded = [];
}
