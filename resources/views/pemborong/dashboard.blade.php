@extends('layout.app2')
@section('content')
<div class="container" style="margin-left:200px;">
    @foreach($liat as $li)
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card" style="width: 18rem;"  align="center" >
          <!--<input type="hidden" name="datapanen_id" value="{{ $li->id}}">!-->
            <img src="{{ URL::to('/')}}/images/{{ $li->image}}" class="card-img-top">
            <div class="card-body">
              <h1 class="card-text">{{ $li->Judul}}</h1>
              <b class="card-text">Rp {{ $li->Harga}}</b>
              <p class="card-text">{{ $li->deskripsi}}</p>

              <div align="center">
                <a href="{{ route('tanggapan.show',$li->id)}}" class="btn btn-primary">Tanggapan</a>
              </div>
            </div>
        </div>
      </div>
    </div>
   @endforeach
</div>


@endsection
