<div>
    <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">{{$settings->appointmentCardTitle}}</h5>
                        <h1 class="display-4">{{$settings->appointmentTitle}}</h1>
                    </div>
                    <p class="text-white mb-5">{{$settings->appointmentDescription}}</p>
                    {{-- <a class="btn btn-dark rounded-pill py-3 px-5 me-3" id='doctors'>Find Doctor</a> --}}
                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">{{$settings->appointmentCardTitle}}</h1>
                        <form action="{{route('appointment.store')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" wire:model='specialty_id' style="height: 55px;">
                                        <option selected="">Choose Specialty</option>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name='doctor_id'>
                                        <option disabled selected>Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;" name='name' value="{{old('name')}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;" name='email' value="{{old('email')}}">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" >
                                        <input type="date" class="form-control bg-light border-0 datetimepicker-input" placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;" name='date' value="{{old('date')}}">
                                    </div>
                                    @error('date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" >
                                        <input type="time" class="form-control bg-light border-0 datetimepicker-input" placeholder="Time"  style="height: 55px;" name='time' value="{{old('time')}}">
                                    </div>
                                    @error('time')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">{{$settings->appointmentCardButton}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
