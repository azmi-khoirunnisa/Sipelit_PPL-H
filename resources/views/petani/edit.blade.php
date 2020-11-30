@extends('layouts.app')

@section('content')

@if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('datapanen.index')}}" class="btn btn-default">Back</a>
        </div>
            <form method="post" action="{{ route('datapanen.update', $data->id) }}" enctype="multipart/form-data">
               @csrf
               @method('PATCH')
                  <div class="form-group">
                    <label class="col-md-4 text-right">Enter Judul</label>
                      <div class="col-md-8">
                        <input type="text" name="Judul" value="{{ $data->Judul }}" class="form-control input-lg" />
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 text-right">Select Image</label>
                          <div class="col-md-8">
                              <input type="file" name="image" />
                                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                                  <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
                          </div>
                      </div>

                  </div>
                    <div class="form-group">
                      <label class="col-md-4 text-right">Enter Harga</label>
                        <div class="col-md-8">
                          <input type="text" name="Harga" value="{{ $data->Harga }}" class="form-control input-lg" />
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 text-right">Deskripsi</label>
                        <div class="col-md-8">
                          <input type="text" name="deskripsi" value="{{ $data->deskripsi }}" class="form-control input-lg" />
                        </div>
                    </div>

                  <div class="form-group text-center">
                    <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
                  </div>
              </form>
            </div>
          </div>
@endsection