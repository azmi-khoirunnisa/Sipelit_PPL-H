@extends('layout.app2')
@section('content')
<div class="container" style="margin-left:200px;">
  @foreach($pembayaran as $pembayaran)
   <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Data Pembayaran</h5>
          <p class="card-text">Id Pembayaran : {{ $pembayaran->id_data_pembayaran}}</p>
          <p class="card-text">Id Pesanan Panen : {{ $pembayaran->datapanen_id}}</p>
          <p class="card-text">Jumlah Panen: {{ $pembayaran->jumlah_panen}}</p>
          <p class="card-text">Waktu Unggah: {{ $pembayaran->created_at}}</p>
          <img src="{{ URL::to('/')}}/images/{{ $pembayaran->bukti_pembayaran}}" class="img-thumbnail">
      </div>
    </div>
  @endforeach
  </div>
@endsection
