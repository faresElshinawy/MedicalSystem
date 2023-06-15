@extends('Doctor/inc/master')

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
                <li class="breadcrumb-item"><a class="text-info" href="#">create</a></li>
                <li class="breadcrumb-item active">Examination</li>
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
        <form class="form-horizontal" method='POST' action="{{route('doctor.examination.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title"  name="title" value='{{old('title')}}'>
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea  class="form-control" placeholder="Description" name='description'>{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control"  placeholder="Price" name="price" value='{{old('price')}}'>
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Offer</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control"  placeholder="Offer" name="offer" value='{{old('offer')}}'>
                        @error('offer')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  name="time" value='{{old('date')}}'>
                        @error('time')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Patient</label>
                    <div class="col-sm-10">
                        <div class="form-group" data-select2-id="40">
                            <select class="form-control select2 select2-hidden-accessible" name="patient" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{old('patient')}}">
                              <option selected="selected" selected disabled>Select patient</option>
                              @foreach ($patients as $patient)
                              <option data-select2-id="{{$patient->id}}" value="{{$patient->id}}">{{$patient->name}}</option>
                              @endforeach
                            </select>
                          </div>
                      @error('patient')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                  </div>
                @livewire('examination-file')
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
              <a href="{{route('doctor.examination.all')}}" class="btn btn-default float-right">Cancel</a>
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
