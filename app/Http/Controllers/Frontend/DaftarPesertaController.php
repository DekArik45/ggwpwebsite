<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Peserta;
use Alert;
use Carbon\Carbon;
use App\DetailPeserta;
use App\Agama;
use Auth;
use App\PeriodePendaftaran;
use App\Prodi;
class DaftarPesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index($order, Request $request)
    {
        
        if ($order == 'premium') {
            $this->data['paket'] = 'Premium';
            $this->data['harga'] = 200000;
            $this->data['fasilitas'] = ['Tenda','2X Makan (siang & sore)','1 Baju TBTN (<a target="_blank" style="font-size:12px;" href="{{asset(images/baju.jpg)}}">lihat design baju</a>)', 'Sertifikat Pengabdian',''];
            $this->data['ukuran'] = $request->ukuran_baju;
        }
        elseif ($order == 'legendary') {
            $this->data['paket'] = 'Legandary';
            $this->data['harga'] = 300000;
            $this->data['fasilitas'] = ['Tenda','2X Makan (siang & sore)','1 Baju TBTN (<a target="_blank" style="font-size:12px;" href="{{asset(images/baju.jpg)}}">lihat design baju</a>)', 'Sertifikat Pengabdian','Transport (bolak-balik)'];
            $this->data['ukuran'] = $request->ukuran_baju;
        }
        elseif ($order == 'standard') {
            $this->data['paket'] = 'Standard';
            $this->data['harga'] = 160000;
            $this->data['fasilitas'] = ['Tenda','2X Makan (siang & sore)', 'Sertifikat Pengabdian','',''];
            $this->data['ukuran'] = '';
        }
        $this->data['prodi'] = Prodi::get();
        $this->data['agama'] = Agama::get();
        return view('frontend.daftar_tbtn', $this->data);
    }

    public function orderPaket()
    {
        $periode = PeriodePendaftaran::where('status','1')->first();
        $now = Carbon::now();
        $start = Carbon::parse($periode['start']);
        $end = Carbon::parse($periode['end']);
        if ($start <= $now) {
            
            if ($end >= $now) {
                return view('frontend.order_paket');
            }
            else {
                return redirect()->back()->with("error_pendaftaran","Periode Pendaftaran Telah Berakhir");
            }
        }
        else{
            return redirect()->back()->with("error_pendaftaran","Periode Pendaftaran Belum Dimulai. Akan dimulai pada tanggal : ".$start->format('d, M Y'));
        }
    }

    public function orderBaju($order)
    {
        $this->data['order'] = $order;
        if ($order == 'premium' || $order == 'legendary') {
            $this->data['class'] = 'radio-ukuran';
            $this->data['checked'] = 'checked';
        }
        else {
            $this->data['class'] = 'ukuran';
            $this->data['checked'] = '';
        }

        $periode = PeriodePendaftaran::where('status','1')->first();
        $now = Carbon::now();
        $start = Carbon::parse($periode['start']);
        $end = Carbon::parse($periode['end']);
        if ($start >= $now) {
            
            if ($end <= $now) {
                return view('frontend.order_baju', $this->data);
            }
            else {
                return redirect()->back()->with("error_pendaftaran","Periode Pendaftaran Telah Berakhir");
            }
        }
        else{
            $start->format('D, M Y');
            return redirect()->back()->with("error_pendaftaran","Periode Pendaftaran Belum Dimulai\nAkan dimulai pada ".$start);
        }

        
    }

    public function daftarPeserta(Request $request)
    {
        // harga baju
        // if ($request->beli_baju == "1") {
        //     $biaya_pendaftaran = 120000;
        //     $harga = 60000;
        //     $sub_total = $request->qty * $harga;
        //     $total = $sub_total + $biaya_pendaftaran;
        // }
        // else {
        //     $biaya_pendaftaran = 140000;
        //     $harga = 0;
        //     $sub_total = $request->qty * $harga;
        //     $total = $sub_total + $biaya_pendaftaran;
        // }
        // return $request->paket;
        
        $periode = PeriodePendaftaran::where('status','1')->first();
        $now = Carbon::now();
        $start = Carbon::parse($periode['start']);
        $end = Carbon::parse($periode['end']);
        if ($start >= $now) {
            if ($end <= $now) {
                if(($request->file("image")->getSize() / 1000) <= 1024 && $request->file("image")->getSize() != false ){
                    $current_timestamp = Carbon::now()->timestamp;
                    $file = $request->file("image");
                    $name = $current_timestamp.$file->getClientOriginalName();
                    $path = '/peserta_image/'. $name;
                    $file->move(public_path().'/peserta_image/', $name);
                    // return $path;
                    // biaya pendaftaran
                    $now = Carbon::now();
                    $kode = $now->format("dmHis");
                    $peserta = Peserta::create([
                        'kode_invoice' => $kode,
                        'paket' => $request->paket,
                        'user_id' => Auth::guard('user')->user()->id,
                        'nim' => $request->nim,
                        'nama' => $request->nama,
                        'prodi_id' => $request->prodi_id,
                        'no_telp' => $request->no_telp,
                        'nama_ortu' => $request->nama_ortu,
                        'no_telp_ortu' => $request->no_telp_ortu,
                        'penyakit_bawaan' => $request->penyakit_bawaan,
                        'vegetarian' => $request->vegetarian,
                        'agama_id' => $request->agama_id,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'tanggal_daftar' => $now,
                        'biaya_pendaftaran' => $request->harga,
                        'surat_keterangan_sehat' => $path,
                        'total' => $request->harga
                        
                    ]);
                    
                    // foreach ($request->ukuran_baju as $value) {
                        
                        if ($request->paket != "Standard") {
                            DetailPeserta::create([
                                'peserta_id' => $peserta->id,
                                'ukuran_baju' => $request->ukuran,
                                'qty' => 1,
                                'harga' => null,
                                'sub_total' => null
                            ]);
                        }
        
                    // }
                    return redirect('/profile')->with("Success", "Terimakasih telah mendaftar sebagai Peserta TBTN 2019");
                }
                else{
                    return redirect()->back()->with("Error","Image tidak boleh lebih dari 1mb");
                }
            }
            else {
                return redirect()->back()->with("error_pendaftaran","Periode Pendaftaran Telah Berakhir");
            }
        }
        else{
            $start->format('D, M Y');
            return redirect()->back()->with("error_pendaftaran","Periode Pendaftaran Belum Dimulai\nAkan dimulai pada ".$start);
        }
    }
}
