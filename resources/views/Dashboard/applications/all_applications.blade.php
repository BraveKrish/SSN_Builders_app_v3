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
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Header -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Manage Candidate Application</h5>
                                <a href="{{ route('jobs.index') }}" class="btn btn-primary d-flex align-items-center" style="padding: 10px 20px; font-weight: bold; border-radius: 8px;">
                                    <i class="fas fa-th-list" style="margin-right: 8px; font-size: 1.2em;"></i> View Job Listing
                                </a>
                                
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
                                    <table id="example1" class="table table-hover table-bordered table-striped text-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Job Details</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Resume URL</th>
                                                <th>Application Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applications as $application)
                                                
                                           
                                            <tr>
                                                <td>
                                                    <strong>{{ $application->job->title }}</strong><br>
                                                    {{-- <small>Job ID: 12345</small><br> --}}
                                                    <small class="text-dark">SSN Builders Group</small><br>
                                                    <span class="badge bg-primary text-capitalize">{{ $application->job->job_type }}</span>
                                                    <span class="badge bg-info ">On: {{ $application->job->posted_date }}</span>
                                                    <span class="badge bg-warning text-capitalize">Status: {{ $application->job->status }}</span>
                                                </td>
                                                {{-- <td class="font-weight-bold text-dark">101</td> --}}
                                                <td>{{ $application->name }}</td>
                                                <td>{{ $application->email }}</td>
                                                <td>{{ $application->phone }}</td>
                                                <td><a href="http://example.com/resume1.pdf" target="_blank">View Resume</a></td>
                                                <td class="text-info">2023-01-01</td>
                                                <td>
                                                    <span class="badge badge-secondary">{{ $application->status }}</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="nav-icon fas fa-cog"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            {{-- <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a> --}}
                                                            <a class="dropdown-item" href="{{ route('application.reply.show',$application->id) }}"><i class="fas fa-envelope"></i> Send Email</a>
                                                            <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                            
                                                            {{-- <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View Details</a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                            <!-- Additional rows can be added here -->
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>Job Details</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Resume URL</th>
                                                <th>Application Date</th>
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
            </div>
        </section>
    </div>
@endsection
