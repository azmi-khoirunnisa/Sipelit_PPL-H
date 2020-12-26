<?php

namespace App\Http\Controllers\Pemborong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\datapanen;
use App\User;
use App\pembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $messages = [
        'required' => ':attribute Mohon diisi'

      ];
      $this->validate($request,[
          'jumlah_panen'        =>  'required|numeric',
          'bukti_pembayaran'    =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ],$messages);

      $bukti_pembayaran = $request->file('bukti_pembayaran');

      $bukti = rand() . '.' . $bukti_pembayaran->getClientOriginalExtension();
      $bukti_pembayaran->move(public_path('images'), $bukti);

      $user = Auth::user();

      $form_data = array(
        'jumlah_panen'         => $request->jumlah_panen,
        'bukti_pembayaran'     => $bukti,
        'datapanen_id'         => $request->datapanen_id,
        'user_id'              => $user->id
      );

    //  $data = $request->all();
      //dd($data);

      pembayaran::create($form_data);
      return redirect()->back()->with('success', 'Data Pembayaran Berhasil Diunggah');
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
        return view ('pemborong.pembayaran',compact('datapanen'));
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

    public function pembayaran()
    {
      $pembayaran = pembayaran::all();
      return view('pemborong.data_pembayaran',compact('pembayaran'));
    }
}
