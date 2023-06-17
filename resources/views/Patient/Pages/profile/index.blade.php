@extends('Patient.inc.master')


@section('content')
    <div class="containter d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded p-5 m-5 mb-0">
                <form action='{{route('patient.profile.update',['patient'=>Auth::guard('patient')->user()->id])}}' method='POST'>
                    @csrf
                    @method('put')
                    <div class="col-12 d-flex justify-content-center mb-5">
                        <img src="{{asset('uploads/patients/'.$patient->image)}}" width="200" height="100" class="img-fluid" alt="">
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="mb-2">Name</label>
                            <input type="text" class="form-control bg-light border-0" placeholder="Name" value="{{old('name')??$patient->name}}" style="height: 55px;" name='name'>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control bg-light border-0" placeholder="Password" style="height: 55px;" name='password'>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="mb-2">Phone</label>
                            <input type="number" class="form-control bg-light border-0" placeholder="phone" value="{{old('phone')??$patient->phone}}" style="height: 55px;" name='phone'>
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="mb-2">Birthdate</label>
                            <input type="date" class="form-control bg-light border-0" placeholder="bithdate" value="{{old('date')??$patient->birthdate}}" style="height: 55px;" name='birthdate'>
                            @error('date')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="mb-2">address</label>
                            <input type="text" class="form-control bg-light border-0" placeholder="address" value="{{old('date')??$patient->address}}" style="height: 55px;" name='address'>
                            @error('address')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="mb-2">Image</label>
                            <input type="file" class="form-control bg-light border-0 p-2" >
                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
