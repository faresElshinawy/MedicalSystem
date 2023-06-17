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
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                  </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                  <td>{{$appointment->id}}</td>
                  <td>{{$appointment->name}}</td>
                  <td>{{$appointment->email}}</td>
                  <td>{{$appointment->doctor->name}}</td>
                  <td>{{$appointment->date}}</td>
                  <td>{{$appointment->time}}</td>
                  <td><span class="badge badge-{{($appointment->status == 'pending' ? 'warning' : ($appointment->status == 'cancel' ? 'danger' : 'success'))}}">{{$appointment->status}}</span></td>
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

