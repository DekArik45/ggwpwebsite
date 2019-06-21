<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Peserta;
use Alert;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dataPeserta()
    {
        $this->data['peserta'] = Peserta::get();

        return view("backend.peserta", $this->data);
    }

    public function transaksiPeserta()
    {
        $this->data['peserta_belum_verifikasi'] = Peserta::where('status','1')->get();
        $this->data['peserta_telah_verifikasi'] = Peserta::where('status','2')->get();
        $this->data['peserta_belum_upload_bukti'] = Peserta::where('status','0')->get();

        return view("backend.transaksi_peserta", $this->data);
    }

    public function detailPeserta($id)
    {
        $this->data['peserta'] = Peserta::where('id',$id)->get();

        return view("backend.detail_peserta", $this->data);
    }

    public function updateStatus($id, Request $request)
    {

        Peserta::where('id',$id)
        ->update([
            'status'=>$request->status,
        ]);
        Alert::success('Success Message', 'Update Success')->persistent("Close");
        
        return redirect()->back();
    }
}
