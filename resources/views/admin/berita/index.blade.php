@extends('layout.admin')

@section('content')

<div class="container" style="margin-top:50px;margin-left:200px;">
  <div align="left">
    <a href="{{ route('berita.create')}}" class="btn btn-success">Tambah Data</a>
  </div><br>
  @foreach($berita as $data)
  <div class="card border-info mb-3">
    <img src="{{ URL::to('/')}}/images/{{ $data->image}}" class="card-img-top" style="width:400px;height:400px;">
    <div class="card-body">
      <h5 class="card-title">{{ $data->judul}}</h5>
      <p class="card-text">{{ $data->deskripsi}}</p>
    </div>
      <div class="left">
      <form action="{{ route('berita.destroy', $data->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Data</button>
        <a href="{{ route('berita.edit', $data->id)}}" class="btn btn-warning">Edit</a>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endsection
