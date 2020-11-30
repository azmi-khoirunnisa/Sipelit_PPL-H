@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                      <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Role</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <th>{{ $user->nama_lengkap}}</th>
                          <th>{{ $user->email}}</th>
                          <th>{{ $user->alamat}}</th>
                          <th>{{ $user->noHp}}</th>
                          <th>{{ implode(',', $user->roles()->get()->pluck('name')->toArray())}}</th>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
