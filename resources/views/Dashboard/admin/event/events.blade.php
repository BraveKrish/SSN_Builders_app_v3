@extends('Dashboard.layout.admin-master')
@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Events</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12">
                        <div class="card text-white bg-light p-3" style="background: linear-gradient(to right,gray, white );">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    {{-- <p class="mb-0 text-dark">All Users</p> --}}
                                </div>
                                <div>
                                    <a href="{{ route('create.event') }}" class="btn btn-success px-3">
                                        <i class="fas fa-plus mr-2"></i> Add New Event
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}

                <div class="row">
                    
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Event Category</th>
                                        <th>Description</th>
                                        <th>Image URL</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($events as $event)
                                    @php
                                    $status = strtolower($event->status);
                                    $badgeColor = '';
                            
                                    switch($status) {
                                        case 'published':
                                            $badgeColor = 'success';
                                            break;
                                        case 'unpublished':
                                        case 'draft':
                                            $badgeColor = 'danger';
                                            break;
                                        default:
                                            $badgeColor = 'secondary'; // Default color if status doesn't match any case
                                    }
                                 @endphp
                                      @php
                                          $i++
                                      @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td> <span class="badge badge-primary">
                                            {{ ucfirst($event->event_category) }}
                                        </span></td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->image_url }}</td>
                                        {{-- <td> <span class="badge badge-primary">
                                            {{ ucfirst($event->status) }}
                                        </span></td> --}}
                                        <td> <span class="badge badge-{{ $badgeColor }}">
                                            {{ ucfirst($status) }}
                                        </span></td>
                                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</td>
                                        <td>
                                            <a href="{{ route('edit.event',$event->id) }}" class="text-warning mr-2"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Event Category</th>
                                        <th>Description</th>
                                        <th>Image URL</th>
                                        <th>Status</th>
                                        <th>Event Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>

                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
