@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Dashboard Petani</h1>
            <div align="right">
              <a href="{{route('datapanen.index')}}" class="btn btn-success btn-sm" >Lihat Data Panen Anda</a>
            </div>
        </div>
    </div>
</div>
@endsection
