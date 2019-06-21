<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PeriodePendaftaran;
use Alert;

class PeriodePendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $this->data['periode_pendaftaran'] = PeriodePendaftaran::get();

        return view('backend.periode_pendaftaran', $this->data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periode_pendaftaran = new PeriodePendaftaran;
        $periode_pendaftaran->start = $request->start;
        $periode_pendaftaran->end = $request->end;
        $periode_pendaftaran->save();

        Alert::success('Success Message', 'Insert Success')->persistent("Close");
        return redirect('admin/periode_pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PeriodePendaftaran::where('id',$id)
        ->update([
            'start'=>$request->start,
            'end'=>$request->end,
        ]);
        Alert::success('Success Message', 'Update Success')->persistent("Close");
        return redirect('/admin/periode_pendaftaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PeriodePendaftaran::where('id','=',$id)->delete();
        Alert::success('Success Message', 'Delete Success')->persistent('Close');
        return redirect('/admin/periode_pendaftaran');
    }
}
