@extends('Patient.inc.master')


@section('content')
    <div class="containter d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded p-5 m-5 mb-0">
                <form  method='POST' action="{{route('home.feedback.store')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="mb-2">Name</label>
                            <input type="text" class="form-control bg-light border-0" placeholder="Name" value="{{old('name')}}" style="height: 55px;" name='name'>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="mb-2">Subject</label>
                            <input type="text" class="form-control bg-light border-0" placeholder="Subject" style="height: 55px;" name='subject'>
                            @error('subject')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 ">
                            <label class="mb-2">message</label>
                            <textarea class="form-control bg-light border-0" placeholder="Enter Your Message" style="height: 100px;" name='message'></textarea>
                            @error('message')
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
