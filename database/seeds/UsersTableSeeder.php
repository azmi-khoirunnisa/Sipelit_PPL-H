<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $petaniRole = Role::where('name', 'petani')->first();
        $pemborongRole = Role::where('name', 'pemborong')->first();

        $admin = User::create([
          'nama_lengkap' => 'admin',
          'email' => 'administratorSipelit@gmail.com',
          'alamat' => 'Jl.Hayam Wuruk, No.33, Jakarta Selatan',
          'noHp' => '08233345689',
          'username' => 'administrator',
          'password' => bcrypt ('administrator')
        ]);
        $petani = User::create([
          'nama_lengkap' => 'petani',
          'email' => 'petaniSipelit@gmail.com',
          'alamat' => 'Jl.King Kong, No.1A, Bogor',
          'noHp' => '081777263980',
          'username' => 'petani',
          'password' => bcrypt ('petani1234')
        ]);
        $pemborong = User::create([
          'nama_lengkap' => 'pemborong',
          'email' => 'pemborongSipelit@gmail.com',
          'alamat' => 'Jl.Sunshine, No.12, Bandung',
          'noHp' => '082333764838',
          'username' => 'pemborong',
          'password' => bcrypt ('pemborong123')
        ]);

        $admin->roles()->attach($adminRole);
        $petani->roles()->attach($petaniRole);
        $pemborong->roles()->attach($pemborongRole);
    }
}
