@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
          <div class="card-header">
            <h1>Judul - {{ $data->Judul}}</h1>
          </div>
            <div class="card-body">
              <img src="{{ URL::to('/') }}/images/{{ $data->image}}" class="img-thumbnail" />
                <h3>Harga - {{ $data->Harga}}</h3>
                  <h3>Deskripsi - {{ $data->deskripsi}}</h3>
                <a href="{{ route('datapanen.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
