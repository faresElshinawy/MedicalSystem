<div>
    <div class="container-fluid bg-primary py-2 mb-5 ">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">{{$settings->examinationsSectionTitle}}</h5>
                    <h1 class="display-1 text-white mb-md-4 fs-2">Hello {{Auth::guard('patient')->user()->name}} {{$settings->examinationsDescription}}</h1>
                    <div class="pt-2">
                        <a href="" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5 col-10">
        <div class="row">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="card-title text-info text-center">{{$settings->examinationsTableTitle}}</h3>

                        <div class="card-tools mb-2">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" wire:model.lazy='search' name="table_search" class="form-control float-right" placeholder="Search">
                                {{-- <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group mb-2 col-3">
                            <label >Filter By Doctor</label>
                            <select class="form-control bg-white select2 select2-hidden-accessible col"  wire:model='doctor_id' style="width: 100%;"   aria-hidden="true">
                                <option selected="selected" selected >Select filter value</option>
                                @foreach ($doctors as $doctor)
                                <option value='{{$doctor->id}}'>{{$doctor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Price</th>
                                <th>status</th>
                                <th>time</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>file</th>
                                <th>offer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                            <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->Patient->name}}</td>
                            <td>{{$result->doctor->name}}</td>
                            <td>{{$result->price}}</td>
                            <td><span class="badge badge-{{($result->status == 'pending' ? 'warning' : ($result->status == 'cancel' ? 'danger' : 'info'))}}">{{$result->status}}</span></td>
                            <td>{{$result->time}}</td>
                            <td>{{$result->title}}</td>
                            <td>{{$result->description}}</td>
                            <td>
                                @if ($result->file)
                                <a href="{{asset('uploads/examination/'.$result->file)}}" class="btn btn-warning" download>Download File</a>
                                @else
                                <p class="text-danger">Examintion does not have file yet</p>
                                @endif
                                </td>
                                <td>{{$result->offer}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="mx-auto">
                        {{$results->links('pagination::bootstrap-4')}}
                    </div>
                    <!-- /.card-body -->
            </div>
        </div>
      </div>
</div>
