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
                <li class="breadcrumb-item active">setting</li>
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
        <form class="form-horizontal" method='POST' action="{{route('admin.settings.update',['setting'=>$setting->id])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Value</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  placeholder="Name" name="value" value='{{old('value')??$setting->value}}'>
                  @error('value')
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
              <a href="{{route('admin.settings.all')}}" class="btn btn-default float-right">Cancel</a>
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
