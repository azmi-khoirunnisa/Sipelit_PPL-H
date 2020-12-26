@extends('layout.admin')

@section('content')



<div class="container" style="margin-top:30px;">
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
                <div class="card-header">Buat Berita Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('berita.store', $user->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                            <div class="col-md-6">
                              <textarea name="deskripsi" rows="8" cols="80" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus>
                              </textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Gambar</label>
                            <div class="col-md-6">
                              <input type="file" name="image" />
                            </div>
                          </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="add" class="btn btn-primary input-lg" value="Simpan" />
                                <a href="{{ route('berita.index')}}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</div>
@endsection
