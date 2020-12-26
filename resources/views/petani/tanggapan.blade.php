@extends('layout.master')
@section('content')
<br>
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
              <div class="card-header"><center>Tanggapan</center></div>
                <div class="card">
              @foreach($tanggapan as $tanggapan)
                  <div class="card-body">
                    <p class="card-text">User id: {{ $tanggapan->user_id}}</p>
                      <b class="card-text">Harga yg ditawarkan: {{ $tanggapan->harga}}</b>
                    <p class="card-text">Deksripsi :{{ $tanggapan->deskripsi}}</p>
                    <div align="right">
                      <a href="{{ route('petani.buat_tanggapan', $tanggapan->id)}}" class="btn btn-success">Tanggapan</a>
                    </div>
                  </div>
              @endforeach

                </div>
             </div>
        </div>
        <div class="row justify-content-center" >
            <div class="col-md-8">
              <div class="card-header"><center>Balas Tanggapan</center></div>
                <div class="card">
            @foreach($balasan as $balasan)
                 <div class="card-body">
                   <p class="card-text">~~Tanggapan dari petani</p>
                   <b class="card-text">Harga yg ditawarkan: {{ $balasan->harga}}</b>
                   <p class="card-text">deskripsi: {{ $balasan->deskripsi}}</p>
                 </div>
            @endforeach
             </div>
           </div>
         </div>
</div>
@endsection
