<div>
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
    <div class="card">
        <div class="card-header">
          <h3 class="card-title text-info d-block">appointments Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" wire:model.lazy='search' name="table_search" class="form-control float-right" placeholder="Search">

              {{-- <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div> --}}
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                  <td>{{$appointment->id}}</td>
                  <td>{{$appointment->name}}</td>
                  <td>{{$appointment->email}}</td>
                  <td>{{$appointment->date}}</td>
                  <td>{{$appointment->time}}</td>
                  <td><span class="badge badge-{{($appointment->status == 'pending' ? 'warning' : ($appointment->status == 'cancel' ? 'danger' : 'success'))}}">{{$appointment->status}}</span></td>
                  <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                          </svg>
                        </button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                            @if ($appointment->status != 'cancel' &&  $appointment->status != 'approved')
                                <form action="{{route('doctor.appointments.update',['appointmentbook'=>$appointment->id])}}" method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="cancel">
                                <button type='submit' class="dropdown-item">Cancel</button>
                                </form>
                            @endif

                            @if ($appointment->status != 'approved' && $appointment->status != 'cancel')
                            <form action="{{route('doctor.appointments.update',['appointmentbook'=>$appointment->id])}}" method="POST">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="approved">
                            <button type='submit' class="dropdown-item">approved</button>
                            </form>
                            @endif

                            <form action="{{route('doctor.appointments.delete',['appointmentbook'=>$appointment->id])}}" method="POST">
                            @csrf
                            @method('delete')
                                <button type='submit' class="dropdown-item">Delete</button>
                            </form>
                    </div>
                  </div>
                </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="mx-auto">
            {{$appointments->links('pagination::bootstrap-4')}}
        </div>
        <!-- /.card-body -->
      </div>



</div>
