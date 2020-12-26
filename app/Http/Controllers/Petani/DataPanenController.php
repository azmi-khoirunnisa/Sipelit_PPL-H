<?php

namespace App\Http\Controllers\Petani;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\datapanen;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;
use App\pembayaran;

class DataPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {

        $data = datapanen::latest()->paginate(5);
        return view ('petani.index', compact('data'))
                    -> with('i', (request()->input('page', 1) - 1) * 5);
        /*$data = datapanen::all();
        dd($data);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
      //dd($user);
      return view('petani.create', compact('user'));
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
        'required' => ':attribute Mohon diisi',

      ];
      $this->validate($request,[
          'Judul'         =>  'required|string',
          'image'         =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'Harga'         =>  'required|numeric',
          'deskripsi'     =>  'required|string'
      ],$messages);


      $image = $request->file('image');

      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      $user = Auth::user();
      $form_data = array(
        'Judul'     => $request->Judul,
        'image'     => $new_name,
        'Harga'     => $request->Harga,
        'deskripsi' => $request->deskripsi,
        'user_id'   => $user->id
      );

    //  $data = $request->all();
      //dd($data);

      datapanen::create($form_data);

      return redirect('petani/datapanen')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = datapanen::findOrFail($id);
      return view('petani.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = datapanen::findOrFail($id);
        return view('petani.edit', compact('data'));
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
      $image_name = $request->hidden_image;
      $image = $request->file('image');
      if($image != '')
      {
          $request->validate([
              'Judul'         =>  'required',
              'image'         =>  'image|max:2048',
              'Harga'         =>  'required',
              'deskripsi'     =>  'required'
          ]);

          $image_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images'), $image_name);
      }
      else
      {
          $request->validate([
              'Judul'      =>  'required',
              'Harga'      =>  'required',
              'deskripsi'  => 'required'
          ]);
      }

      $form_data = array(
          'Judul'            =>   $request->Judul,
          'image'            =>   $image_name,
          'Harga'            =>   $request->Harga,
          'deskripsi'        =>   $request->deskripsi

      );

      datapanen::whereId($id)->update($form_data);

      return redirect('petani/datapanen')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = datapanen::findOrFail($id);
        $data->delete();

        return redirect('datapanen')->with('success', 'Data is successfully deleted');
    }

    public function pembayaran()
    {
      $pembayaran = pembayaran::all();
      return view('petani.pembayaran',compact('pembayaran'));
    }
}
