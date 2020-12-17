<?php

namespace App\Http\Controllers\Pemborong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\tanggapan;
use App\User;
use App\datapanen;
use Auth;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = tanggapan::all();
        return view('pemborong.tanggapan');
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
       $request->validate([
         'harga'=>'required|numeric',
         'deskripsi'=> 'required|alpha',
       ]);

      // $datapanen = Auth::datapanen();

      $user = Auth::user();

      $form = array(
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'user_id' => $user->id,
        'datapanen_id' =>$request->datapanen_id
      );

      tanggapan::create($form);
      //$data = $request->all();
      //dd($data);
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $datapanen = datapanen::find($id);
      return view('pemborong.tanggapan', compact('datapanen'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
