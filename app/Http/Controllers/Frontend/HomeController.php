<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Media;
use App\Pengumuman;
use App\JenisMedia;

class HomeController extends Controller
{
    

    public function index()
    {
        $this->data['pengumuman'] = Pengumuman::take(5)->get();
        $this->data['foto_top'] = Media::where('jenis_media_id','1')->take(2)->get();
        $this->data['foto_bottom'] = Media::where('jenis_media_id','1')->skip(38)->take(2)->get();
        $this->data['video'] = Media::where('jenis_media_id','2')->first();

        return view('frontend.index', $this->data);
    }

    public function clearNotif(){
        Auth::guard('customer')->user()->unreadNotifications()->update(['read_at' => now()]);
    }
}
