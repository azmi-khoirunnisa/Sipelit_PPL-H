@extends('layout.master')

@section('content')

<div class="container">
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Panen</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('datapanen.store', $user->id)}}" enctype="multipart/form-data">
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

                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Pilih Gambar</label>
                            <div class="col-md-6">
                              <input type="file" name="image" />
                            </div>
                            <!--<input type="hidden" name="toko_id" value="$toko->id">!-->
                          </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="add" class="btn btn-primary input-lg" value="Tambah" />
                                <a href="{{ route('datapanen.index')}}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
