    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="{{route('home.main')}}" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>{{$settings->websiteName}}</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{route('home.main')}}" class="nav-item nav-link {{request()->is('/')?'active':''}}">{{$settings->homeButton}}</a>
                        <a href="{{route('home.doctor.show')}}" class="nav-item nav-link {{request()->is('doctors')?'active':''}}">{{$settings->doctorsButton}}</a>
                        @if (!Auth::guard('patient')->check())
                            <a href="{{route('patient.login')}}" class="nav-item nav-link {{request()->is('patient/login')?'active':''}}">login</a>
                        @endif
                    @if (Auth::guard('patient')->check())
                            <a href="{{route('home.feedback.show')}}" class="nav-item nav-link {{request()->is('contact')?'active':''}}">{{$settings->contactButton}}</a>
                        <a href="{{route('home.patient.examination.show')}}" class="nav-item nav-link {{request()->is('patient/examination')?'active':''}}">{{$settings->examinationsButton}}</a>
                        <a href="{{route('patient.profile.show',['name'=>Auth::guard('patient')->user()->name,'patient'=>Auth::guard('patient')->user()->id])}}" class="nav-item nav-link {{$active??''}}">{{$settings->profileButton}}</a>
                    @endif
                    </div>
                    @if (Auth::guard('patient')->check())
                        <div class="mx-3">
                            <form action="{{route('patient.logout')}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
