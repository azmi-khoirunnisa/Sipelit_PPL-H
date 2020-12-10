<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function edit(){
      if (Auth::user()) {
        $user = User::find(Auth::user()->id);

        if ($user){
            return view('user.edit')->withUser($user);
        }else {
            return redirect()->back();
        }

      }else {
        return redirect()->back();
      }

    }
    public function update(Request $request){
      $user = User::find(Auth::user()->id);

      if ($user) {
          $user->nama_lengkap = $request['nama_lengkap'];
          $user->email = $request['email'];
          $user->alamat = $request['alamat'];
          $user->noHp = $request['noHp'];
          $user->username = $request['username'];

          $user->save();

          return redirect()->back();
      } else {
          return redirect()->back();
      }



      /*$user = User::find(Auth::user()->id);

      if ($user) {
        $validate = null;
        if (Auth::user()->email === $request['email']) {
              $validate = $request->validate([
                'nama_lengkap' => 'required|max:255',
                'email' => 'required|email',
                'alamat' => 'required|max:255',
                'noHp' => 'required|min:12|max:13',
                'username' => 'required|min:8'
          ]);

        } else {
            $validate = $request->validate([
              'nama_lengkap' => 'required|max:255',
              'email' => 'required|email|unique:users',
              'alamat' => 'required|max:255',
              'noHp' => 'required|min:12|max:13',
              'username' => 'required|min:8'
          ]);
        }
            if($validate){
              $user->nama_lengkap = $request['nama_lengkap'];
              $user->email = $request['email'];
              $user->alamat = $request['alamat'];
              $user->noHp = $request['noHp'];
              $user->username = $request['username'];
              $user->save();

              $request->session()->flash('success');
              return redirect()->back();
      } else {
          return redirect()->back();
      }

      }else {
        return redirect()->back();
      }*/
}



    public function passwordEdit(){

    }
    public function passwordUpdate(){

    }
    public function profile($id){
      $user = User::find($id);

      if ($user) {
         return view('user.profile')->withUser($user);
      } else {
        return redirect()->back();
      }
    }
}
