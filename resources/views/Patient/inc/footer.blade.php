    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 py-5 ">
        <div class="container py-5">
            <div class="row g-5 d-flex justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">{{$settings->getInTouchTitle}}</h4>
                    <p class="mb-4">{{$settings->getInTouchDescriptoin}}</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>{{$settings->address}}</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>{{$settings->email}}</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>{{$settings->phone}}</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{route('home.main')}}"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="{{route('home.doctor.show')}}"><i class="fa fa-angle-right me-2"></i>DOCTOR</a>
                        @if (Auth::guard('patient')->check())
                        <a class="text-light" href="{{route('home.feedback.show')}}"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                        @else
                        <a class="text-light" href="{{route('patient.login')}}"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{$settings->facebook}}"><i class="fa fa-angle-right me-2"></i>FACEBOOK</a>
                        <a class="text-light mb-2" href="{{$settings->instgram}}"><i class="fa fa-angle-right me-2"></i>INSTGRAM</a>
                        <a class="text-light mb-2" href="{{$settings->linkedIn}}"><i class="fa fa-angle-right me-2"></i>LINKED IN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">{{$settings->websiteName}}</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Developed by <a class="text-primary" href="https://htmlcodex.com">Fares El Shinawy</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('PatientAssets')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('PatientAssets')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('PatientAssets')}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('PatientAssets')}}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{asset('PatientAssets')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{asset('PatientAssets')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('PatientAssets')}}/js/main.js"></script>
    @livewireScripts
</body>
</html>
