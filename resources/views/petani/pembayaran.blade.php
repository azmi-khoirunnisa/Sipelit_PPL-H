@extends('layout.master')

@section('content')
<div class="container" style="margin-left:200px;">
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">User Id</th>
        <th scope="col">Datapanen Id</th>
        <th scope="col">Jumlah Panen</th>
        <th scope="col">Bukti Pembayaran</th>
      </tr>
        </thead>
        @foreach($pembayaran as $pembayaran)
    <tbody>
      <tr>
        <td>{{ $pembayaran->user_id}}</td>
        <td>{{ $pembayaran->datapanen_id}}</td>
        <td>{{ $pembayaran->jumlah_panen}}</td>
        <td><img src="{{ URL::to('/')}}/images/{{ $pembayaran->bukti_pembayaran}}" class="img-thumbnail" width="75"></td>
      </tr>
    </tbody>
     @endforeach
  </table>
</div>
@endsection
