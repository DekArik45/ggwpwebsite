<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $this->data['pengumuman'] = Pengumuman::get();
        return view('frontend.pengumuman', $this->data);
    }

    public function detailPengumuman($id)
    {
        $this->data['pengumuman_sidebar'] = Pengumuman::take(10)->orderBy('id','DESC')->get();
        $this->data['pengumuman'] = Pengumuman::where('id',$id)->get();
        return view('frontend.detail_pengumuman', $this->data);
    }
}
