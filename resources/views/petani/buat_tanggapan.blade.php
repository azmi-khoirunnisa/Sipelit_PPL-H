@extends('layout.master')

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
    <div class="row justify-content-center" >
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"><center>Berikan Tanggapan Anda</center></div>
            <div class="card-body">
              <form method="POST" action="{{ route('petani.buat_tanggapan.store')}}">
                @csrf

                <div class="form-group row">
                  <label for="Harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>
                    <div class="col-md-6">
                      <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                        @error('harga')
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
                      <input type="hidden" name="datapanen_id" value="{{ $tanggapan->datapanen_id}}">
                      <input type="hidden" name="tanggapan_id" value="{{ $tanggapan->id}}">
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <input type="submit" name="add" class="btn btn-primary input-lg" value="Kirim"/>
                    <a href="{{route('petani.tanggapan',$tanggapan->datapanen_id)}}" class="btn btn-warning">Batal</a>
                  </div>
                </div>
             </form>
           </div>
         </div>
      </div>
    </div>
</div>

@endsection
