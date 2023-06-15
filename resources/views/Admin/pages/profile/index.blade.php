@extends('Admin/inc/master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Admins</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a class="text-info" href="#">edit</a></li>
                <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

        {{-- admins livewire component --}}
        <form class="form-horizontal" method='POST' action="{{route('admin.update',['admin'=>$admin->id])}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  placeholder="Name" name="name" value='{{old('name')??$admin->name}}'>
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value='{{old('email')??$admin->email}}'>
                      @error('email')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value='{{old('password')}}'>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control"  placeholder="Phone" name="phone" value='{{old('phone')??$admin->phone}}'>
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name='image'>
                      <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                <div class="container-fluid my-3 mx-auto d-flex justify-content-center">
                    @if ($admin->image)
                    <img src="{{asset('uploads/Admins/'.$admin->image)}}" width="300" height="150" class="img-fluid" alt="">
                    @else
                    <img src="https://placehold.co/600x400.png" class="img-fluid" width="90" height="50" alt="">
                    @endif
                </div>
                @error('image')
                <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
            </div>
              {{-- <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                    <label class="form-check-label" for="exampleCheck2">Remember me</label>
                  </div>
                </div>
              </div> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">submit</button>
              <a href="{{route('admin.admins')}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
          </form>


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection()
