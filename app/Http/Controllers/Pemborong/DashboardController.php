<?php

namespace App\Http\Controllers\Pemborong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\datapanen;
use App\berita;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
       $this->middleware('auth');
     }

    public function index()
    {

     return view ('pemborong.dashboard');
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
        //
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
    public function berita()
    {
      $berita = berita::all();
      return view('pemborong.berita',compact('berita'));
    }

    public function panen()
    {
      $hasil = datapanen::all();
     // dd($hasil);
     return view ('pemborong.panen', ['liat'=>$hasil]);
    }
}
