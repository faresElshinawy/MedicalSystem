@extends('Patient.inc.master')


@section('content')

    <div class="containter d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="bg-white rounded p-5 m-5 mb-0">
                <form action="{{route('patient.login.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control bg-light border-0" placeholder="Username" name='name' style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control bg-light border-0" placeholder="password" name='password' style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
