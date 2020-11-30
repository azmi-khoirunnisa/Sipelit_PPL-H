@extends('layouts.app')

@section('content')

<div align="right">
  <a href="{{route('datapanen.create')}}" class="btn btn-success btn-sm" >Add</a>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message}}</p>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Postingan Anda</div>
                <table>
                  <tr>
                    <th width="15%">Judul</th>
                    <th width="20%">Gambar</th>
                    <th width="10%">Harga</th>
                    <th width="25%">Deskripsi</th>
                    <th width="30%">Action</th>
                  </tr>
                  @foreach($data as $row)
                  <tr>
                    <td>{{ $row->Judul}}</td>
                    <td><img src="{{ URL::to('/')}}/images/{{ $row->image}}" class="img-thumbnail" width="75" /></td>
                    <td>{{ $row->Harga}}</td>
                    <td>{{ $row->deskripsi}}</td>
                    <td>
                      <a href="{{ route('datapanen.show', $row->id)}}" class="btn btn-primary">Show</a>
                      <a href="{{ route('datapanen.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('datapanen.destroy', $row->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
{!! $data->links() !!}
@endsection