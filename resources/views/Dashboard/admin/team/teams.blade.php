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
                            <li class="breadcrumb-item"><a href="/admin">Teams</a></li>
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
                                    <!-- Placeholder for potential future content -->
                                </div>
                                <div>
                                    <a href="{{ route('create.team') }}" class="btn btn-success px-3">
                                        <i class="fas fa-plus mr-2"></i> Add New Team
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                    {{-- {{ $teams }} --}}
                        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Operation was successful.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> --}}
                        
                        <div class="card">
                            <div class="card-header">
                                <!-- Placeholder for potential future content -->
                            </div>
                            <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($teams as $team)
                            @php
                                $i++;
                    
                                $teamStatus = $team->is_active;
                    
                                $badgeColor = '';
                                $badgeText = '';
                    
                                switch ($teamStatus) {
                                    case 1:
                                        $badgeColor = 'success';
                                        $badgeText = 'Active';
                                        break;
                                    case 0: 
                                        $badgeColor = 'danger';
                                        $badgeText = 'Inactive';
                                        break;
                                    default:
                                        $badgeColor = 'secondary';
                                        $badgeText = 'Unknown';
                                        break;
                                }
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->position }}</td>
                                <td>{{ $team->role }}</td>
                                <td>{{ $team->contact }}</td>
                                <td>{{ $team->address }}</td>
                                <td><span class="badge badge-{{ $badgeColor }}">{{ $badgeText }}</span></td>
                                {{-- <td><span class="badge badge-success">Active</span></td> --}}
                                <td>
                                    <a href="{{ route('edit.team',$team->id) }}" class="text-warning mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                                        <!-- Add more rows as needed -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Role</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Status</th>
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
