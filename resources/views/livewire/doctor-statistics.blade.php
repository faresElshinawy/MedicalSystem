<div>
    <div class="row">
        {{-- <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Doctors</span>
              <span class="info-box-number">
                {{$doctorsCount}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
                <!-- Left col -->
                <div class="col-md-12">
                    <div class="container-fluid mb-5 d-flex justify-content-center">
                        <div class="col-4">
                             <label class="d-block">Starts From</label>
                            <input type="date" class="form-control col" wire:model='timeStarts'>
                        </div>
                        <div class="col-4">
                            <label class="d-block">Ends at</label>
                            <input type="date" class="form-control col" wire:model='timeEnds'>
                        </div>
                    </div>
                </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">patients</span>
              <span class="info-box-number">{{$patientsCount}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Examintation</span>
              <span class="info-box-number">{{$examinationsCount}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                  </svg>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Patients Average Age</span>
                  <span class="info-box-number">{{$patientAverageAge}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Revenue</span>
              <span class="info-box-number">${{$totalRevenue}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Pateints</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Age</th>
                      <th>Birthdate</th>
                      <th>Doctor</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($patients as $patient)
                      <tr>
                          <td>{{$patient->id}}</td>
                          <td>{{$patient->name}}</td>
                          <td>{{$patient->phone}}</td>
                          <td>{{$patient->age}}</td>
                          <td>{{$patient->birthdate}}</td>
                          <td>{{$patient->doctor->name}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
                <div class="d-flex justify-content-center">
                    {{$patients->links('pagination::bootstrap-4')}}
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{route('doctor.patients.create')}}" class="btn btn-sm btn-info float-left">add new patients</a>
                {{$patients->links('pagination::bootstrap-4')}}
                <a href="{{route('doctor.patients.all')}}" class="btn btn-sm btn-secondary float-right">View All Patients</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
          <!-- /.col -->

            </div>
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Examinations</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Doctor</th>
                      <th>Patient</th>
                      <th>Status</th>
                      <th>Price</th>
                      <th>time</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($examinations as $examination)
                      <tr>
                        <td>{{$examination->id}}</td>
                        <td>{{$examination->doctor->name}}</td>
                        <td>{{$examination->patient->name}}</td>
                        <td><span class="badge badge-{{($examination->status == 'pending' ? 'warning' : ($examination->status == 'cancel' ? 'danger' : 'info'))}}">{{$examination->status}}</span></td>
                        <td>{{$examination->price}}</td>
                        <td>{{$examination->time}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
                <div class="d-flex justify-content-center">
                    {{$examinations->links('pagination::bootstrap-4')}}
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{route('doctor.examination.create')}}" class="btn btn-sm btn-info float-left">add new examination</a>
                <a href="{{route('doctor.examination.all')}}" class="btn btn-sm btn-secondary float-right">View All Examination</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
          <!-- /.col -->

    </div>
      <!-- /.row -->

</div>
