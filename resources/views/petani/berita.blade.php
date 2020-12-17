@extends('layout.master')

@section('content')

<div class="container" style="margin-top:50px;margin-left:200px;">
  @foreach($berita as $data)
  <div class="card border-info mb-3">
    <img src="{{ URL::to('/')}}/images/{{ $data->image}}" class="card-img-top" style="width:400px;height:400px;">
    <div class="card-body">
      <h5 class="card-title">{{ $data->judul}}</h5>
      <p class="card-text">{{ $data->deskripsi}}</p>
    </div>
  </div>
  @endforeach
</div>
@endsection
