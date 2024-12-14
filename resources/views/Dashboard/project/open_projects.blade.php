@extends('Dashboard.layout.admin-master')

@section('main-content')
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
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12">
                        <div class="card p-3 text-white" style="background: linear-gradient(to right, gray, white);">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0">Open Project List</h5>
                                </div>
                                <div>
                                    <a href="{{ route('projects.index') }}" class="btn btn-success px-3">
                                        <i class="fas fa-plus mr-2"></i> View Projects
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Table Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-striped text-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="font-weight-bold text-dark">{{ $project->name }}</td>
                                                <td>{{ Str::limit($project->description, 50) }}</td>
                                                <td class="text-info">{{ $project->start_date }}</td>
                                                <td class="text-info">{{ $project->end_date }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $project->status == 'Active' ? 'success' : 'danger' }}">
                                                        {{ $project->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="nav-icon fas fa-cog"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            {{-- <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a> --}}
                                                            <a class="dropdown-item" href="{{ route('view.openproject',$project->id) }}"><i class="fas fa-eye"></i> View Details</a>
                                                            {{-- <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash"></i> Delete</a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        
        
    </div>
@endsection
