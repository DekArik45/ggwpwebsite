<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use Alert;
use App\Admin;
use App\Peserta;
use App\Notifications\Backend\AdminNotif;
use App;
use PDF;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {

        $this->data['peserta'] = Peserta::where('user_id',Auth::guard('user')->user()->id)->get();
        $data_expired = Peserta::where('user_id', Auth::guard('user')->user()->id)
        ->where('status','0')
        ->get();
        
        $this->data['now'] = Carbon::now()->format('Y-m-d H:m:s');
        foreach ($data_expired as $key) {
            if ($key->time_out < $this->data['now']) {
                Peserta::where('id',$key->id)->update([
                    'status' => '4'
                ]);
            }
        }

        // return($this->data['transaction_detail']);

        $this->data['now'] = Carbon::now();

        // $duration = $end->diffInHours($start);

        return view('frontend.profile', $this->data);
    }

    public function uploadBukti($id, Request $request)
    {
        
        if(($request->file("image")->getSize() / 1000) <= 1024 && $request->file("image")->getSize() != false ){
            $current_timestamp = Carbon::now()->timestamp;
            $file = $request->file("image");
            $name = $current_timestamp.$file->getClientOriginalName();
            $path = '/peserta_image/'. $name;
            $file->move(public_path().'/peserta_image/', $name);

            Peserta::find($id)->update([
                'bukti_pembayaran' => $path,
                'status' => '1'
            ]);

            // Alert::success('Success Message', 'Upload Success')->persistent("Close");
            // $admin = Admin::find(1);
            // $admin->notify(new AdminNotif("<a href='/admin/transaksi'><i class='fa fa-users text-aqua'></i> User ".Auth::guard('customer')->user()->name." telah meng-upload bukti pembayaran </a>"));
            return redirect()->back()->with('Success Upload','Bukti Pembayaran Berhasil di Upload');
        }
        else {
            // Alert::error('Error Message', 'make sure the file under 2mb')->persistent("Close");
            return redirect()->back()->with("Error Upload","Pastikan ukuran image kurang dari 1mb");
        }

    }

    public function listPeserta()
    {
        $this->data['list_peserta'] = Peserta::where('user_id',Auth::guard('user')->user()->id)
        ->get();

        return view('frontend.list_peserta', $this->data);
    }

    public function detailPeserta($id)
    {
        $this->data['peserta'] = Peserta::where('id',$id)
        ->first();

        $now = Carbon::now();
        $t1 = Carbon::parse($this->data['peserta']->time_out);
        $t2 = Carbon::parse($now);
        $this->data['second'] = $t2->diffInSeconds($t1);

        return view('frontend.detail_peserta', $this->data);
    }

    public function downloadInvoice($id)
    {        
        $data = Peserta::where('id',$id)->first();
        if ($data->status == '2') {
            
            $pdf = PDF::loadview('frontend.invoice');
            // $pdf->set_base_path("localhost:8000/public/");
    	    return $pdf->download('laporan-pegawai-pdf.pdf');
        }
        else{
            return redirect()->back()->with("error_download","Anda tidak diijinkan mengakses halaman ini");
        }
    }
}
