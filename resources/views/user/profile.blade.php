@extends('layout.universal')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row" align="center">Nama Lengkap</th>
                    <td> {{ $user->nama_lengkap}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat</th>
                    <td>A{{ $user->alamat}}</td>
                  </tr>
                  <tr>
                    <th scope="row">No Handphone</th>
                    <td>{{ $user->noHp}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Username</th>
                    <td>{{ $user->username}}</td>
                  </tr>
                </tbody>
              </table>
                <div class="form-group text-center">
                  <a href="{{ route('user.edit')}}" class="btn btn-primary">Ubah Akun</a>
                </div>
              </div>
</div>
            </div>
          </div>

@endsection

<script type="text/javascript">
  document.title = 'profile';
</script>
