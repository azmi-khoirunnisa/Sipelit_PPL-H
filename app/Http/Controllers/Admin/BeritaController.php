<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\berita;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = berita::all();
        return view('admin.berita.index',compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.berita.create', compact('user'));
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
          'judul'         =>  'required|string',
          'image'         =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'deskripsi'     =>  'required|string'
      ]);


      $image = $request->file('image');

      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);

      $user = Auth::user();

      $form_data = array(
        'judul'     => $request->judul,
        'image'     => $new_name,
        'deskripsi' => $request->deskripsi,
        'user_id'   => $user->id
      );

      berita::create($form_data);

      return redirect('admin')->with('success', 'Data Added successfully.');
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
      $data = berita::findOrFail($id);
      return view('admin.berita.edit', compact('data'));
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
              'judul'         =>  'required',
              'image'         =>  'image|max:2048',
              'deskripsi'     =>  'required'
          ]);

          $image_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images'), $image_name);
      }
      else
      {
          $request->validate([
              'judul'      =>  'required',
              'deskripsi'  => 'required'
          ]);
      }

      $form_data = array(
          'judul'            =>   $request->judul,
          'image'            =>   $image_name,
          'deskripsi'        =>   $request->deskripsi

      );

      berita::whereId($id)->update($form_data);

      return redirect('admin/berita')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = berita::findOrFail($id);
      $data->delete();

      return redirect('admin/berita')->with('success', 'Data is successfully deleted');
    }
}
