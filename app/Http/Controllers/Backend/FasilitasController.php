<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fasilitas;
use Alert;

class FasilitasController extends Controller
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
        $this->data['fasilitas'] = Fasilitas::get();

        return view('backend.fasilitas', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fasilitas = new Fasilitas;
        $fasilitas->jenis_fasilitas = $request->jenis_fasilitas;
        $fasilitas->fasilitas = $request->fasilitas;
        $fasilitas->save();

        Alert::success('Success Message', 'Insert Success')->persistent("Close");
        return redirect('admin/fasilitas');
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
        Fasilitas::where('id',$id)
        ->update([
            'jenis_fasilitas'=>$request->jenis_fasilitas,
            'fasilitas'=>$request->fasilitas,
        ]);
        Alert::success('Success Message', 'Update Success')->persistent("Close");
        return redirect('/admin/fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fasilitas::where('id','=',$id)->delete();
        Alert::success('Success Message', 'Delete Success')->persistent('Close');
        return redirect('/admin/fasilitas');
    }
}
