@extends('layouts.app')

@section('content')
<div class="container">
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create Your Account</div>
               <div class="card-body">
                   <form method="POST" action="{{ route('daftar.create')}}">
                       @csrf

                       <div class="form-group row">
                           <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                           <div class="col-md-6">
                               <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus>

                               @error('nama_lengkap')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                           <div class="col-md-6">
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                               @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                           <div class="col-md-6">
                               <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                               @error('alamat')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="noHp" class="col-md-4 col-form-label text-md-right">{{ __('No Handphone') }}</label>

                           <div class="col-md-6">
                               <input id="noHp" type="text" class="form-control @error('noHp') is-invalid @enderror" name="noHp" value="{{ old('noHp') }}" required autocomplete="noHp" autofocus>

                               @error('noHp')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                           <div class="col-md-6">
                               <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                               @error('username')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                           <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           </div>
                       </div>

                       <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                   {{ __('Daftar') }}
                               </button>
                               <a href="#" class="btn btn-warning">Batal</a>
                           </div>

                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
