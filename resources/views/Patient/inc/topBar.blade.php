    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>{{$settings->phone}}</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>{{$settings->email}}</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="{{$settings->facebook}}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="{{$settings->twitter}}">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="{{$settings->linkedIn}}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="{{$settings->instgram}}">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="{{$settings->youtube}}">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
