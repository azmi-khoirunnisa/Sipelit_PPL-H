@extends('layout.app2')
@section('content')
<div class="container">
    @foreach($liat as $li)
      <div class="card" style="width: 18rem;"  align="center" >
          <img src="{{ URL::to('/')}}/images/{{ $li->image}}" class="card-img-top">
          <div class="card-body">
            <h1 class="card-text">{{ $li->Judul}}</h1>
            <b class="card-text">Rp {{ $li->Harga}}</b>
            <p class="card-text">{{ $li->deskripsi}}</p>
          </div>
      </div>

   @endforeach
</div>


@endsection
