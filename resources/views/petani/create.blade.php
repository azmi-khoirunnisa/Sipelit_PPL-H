@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
  </ul>
</div>
@endif

<div align="right">
  <a href="{{ route('datapanen.index')}}" class="btn btn-default">Back</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Your Data</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('datapanen.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="Judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>

                            <div class="col-md-6">
                                <input id="Judul" type="text" class="form-control @error('Judul') is-invalid @enderror" name="Judul" value="{{ old('Judul') }}" required autocomplete="Judul" autofocus>

                                @error('Judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="Harga" type="text" class="form-control @error('Harga') is-invalid @enderror" name="Harga" value="{{ old('Harga') }}" required autocomplete="Harga" autofocus>

                                @error('Harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus>

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 text-right">Select Profile Image</label>
                            <div class="col-md-8">
                              <input type="file" name="image" />
                            </div>
                          </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
