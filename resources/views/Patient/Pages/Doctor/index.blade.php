@extends('Patient.inc.master')

@section('content')
    @livewire('appointment-book')
            <!-- Team Start -->
            <div class="container-fluid py-5" id="doctors">
                <div class="container">
                    <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">{{$settings->doctorSectionTitle}}</h5>
                        <h1 class="display-4">{{$settings->doctorTitle}}</h1>
                    </div>
                    <div class="owl-carousel team-carousel position-relative">
                        @foreach ($doctors as $doctor)
                        <div class="team-item">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="{{asset('uploads/Doctors/'.$doctor->image)}}" style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{$doctor->name}}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{$doctor->title}}</h6>
                                        <p class="m-0">{{$doctor->description}}</p>
                                    </div>
                                    {{-- <div class="d-flex mt-auto border-top p-4">
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Team End -->

@endsection
