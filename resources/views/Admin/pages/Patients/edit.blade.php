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
                <li class="breadcrumb-item active">patient</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

        {{-- admins livewire component --}}
        <form class="form-horizontal" method='POST' action="{{route('admin.patients.update',['patient'=>$patient->id])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  placeholder="Name" name="name" value='{{old('name')??$patient->name}}'>
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value='{{old('password')??$patient->password}}'>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control"  placeholder="Phone" name="phone" value='{{old('phone')??$patient->phone}}'>
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Birthdate</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control"  name="birthdate" value='{{old('date')??$patient->birthdate}}'>
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="address"  name="address" value='{{old('address')??$patient->address}}'>
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Doctor</label>
                    <div class="col-sm-10">
                        <div class="form-group" data-select2-id="40">
                            <select class="form-control select2 select2-hidden-accessible" name="doctor" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{old('doctor')}}">
                              <option selected="selected" selected disabled>Select doctor</option>
                              @foreach ($doctors as $doctor)
                              <option data-select2-id="{{$doctor->id}}" value="{{$doctor->id}}"@selected($patient->doctor->id)>{{$doctor->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        @error('doctor')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="container-fluid my-3 mx-auto d-flex justify-content-center">
                    @if ($patient->image)
                    <img src="{{asset('uploads/Patients/'.$patient->image)}}" width="300" height="150" class="img-fluid" alt="">
                    @else
                    <img src="https://placehold.co/600x400.png" class="img-fluid" width="90" height="50" alt="">
                    @endif
                </div>
                @livewire('patient-image')
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
              <a href="{{route('admin.patients.all')}}" class="btn btn-default float-right">Cancel</a>
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
