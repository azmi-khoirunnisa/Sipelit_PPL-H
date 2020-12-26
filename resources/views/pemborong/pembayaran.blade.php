@extends('layout.app2')
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
                <div class="card-header">Form Pembayaran</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.store')}}" enctype="multipart/form-data">
                        @csrf

                          <div class="form-group row">
                            <label for="jumlah_panen" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Panen Rp') }}</label>

                            <div class="col-md-6">
                                <input id="jumlah_panen" type="text" class="form-control @error('jumlah_panen') is-invalid @enderror" name="jumlah_panen" value="{{ old('jumlah_panen') }}" required autocomplete="jumlah_panen" autofocus>

                                @error('jumlah_panen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Bukti Pembayaran</label>
                            <div class="col-md-6">
                              <input type="file" name="bukti_pembayaran" />
                              <input type="hidden" name="datapanen_id" value="{{ $datapanen->id}}">
                            </div>
                          </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="kirim" class="btn btn-primary input-lg" value="Kirim" />
                                <a href="" class="btn btn-warning">Batal</a>
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
