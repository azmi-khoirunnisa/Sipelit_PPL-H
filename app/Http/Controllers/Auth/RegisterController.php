<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:200'],
            'noHp' => ['required', 'numeric', 'min:12'],
            'username' => ['required', 'alpha_num', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'noHp' => $data['noHp'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::select('id')->where('name','petani')->first();

        $user->roles()->attach($role);

        return $user;

    }
}
