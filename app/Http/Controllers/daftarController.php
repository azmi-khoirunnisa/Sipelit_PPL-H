<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class daftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftar-pemborong');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('guest');
     }

     public function validator(array $data)
     {
         return Validator::make($data, [
             'nama_lengkap' => ['required', 'alpha', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'alamat' => ['required', 'alpha_num', 'max:255'],
             'noHp' => ['required', 'numeric', 'max:13'],
             'username' => ['required', 'alpha_num', 'max:255'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
     }
      public function create(array $data)
    {
      $user = User::create([
          'nama_lengkap' => $data['nama_lengkap'],
          'email' => $data['email'],
          'alamat' => $data['alamat'],
          'noHp' => $data['noHp'],
          'username' => $data['username'],
          'password' => Hash::make($data['password']),
      ]);

      $role = Role::select('id')->where('name','pemborong')->first();

      $user->roles()->attach($role);

      return $user;

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
