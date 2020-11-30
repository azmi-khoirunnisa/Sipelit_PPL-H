@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('datapanen.index')}}" class="btn btn-default">Back</a>
        </div>
        <div class="col-md-8">
          <h3>Judul - {{ $data->Judul}}</h3>
          <img src="{{ URL::to('/') }}/images/{{ $data->image}}"class="img-thumbnail" />
          <h3>Harga - {{ $data->Harga}}</h3>
          <h3>Deskripsi - {{ $data->deskripsi}}</h3>
        </div>
    </div>
</div>
@endsection
