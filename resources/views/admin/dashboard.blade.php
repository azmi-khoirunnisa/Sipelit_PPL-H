@extends('layout.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div align="center">
            <h1>Admin Dashboard</h1>
          </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <!--<div align="right">
                        <a href="{{route('admin.users.index')}}" class="btn btn-success btn-sm" >Show All User</a>
                      </div>!-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
