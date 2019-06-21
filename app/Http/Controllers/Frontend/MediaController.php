<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use Alert;

class MediaController extends Controller
{
    public function foto()
    {
        $this->data['foto'] = Media::where('jenis_media_id','1')->get();
        return view('frontend.foto', $this->data);
    }

    public function video()
    {
        $this->data['video'] = Media::where('jenis_media_id','2')->get();
        $this->data['detail_video'] = "";
        return view('frontend.video', $this->data);
    }

    public function detailVideo($id)
    {
        $this->data['detail_video'] = Media::
        where('id',$id)
        ->first();

        $this->data['video'] = Media::where('jenis_media_id','2')->get();

        return view('frontend.video', $this->data);

    }
}
