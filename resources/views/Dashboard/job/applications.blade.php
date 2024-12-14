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
                <!-- Header Card -->
                <div class="row">
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
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-sm w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Job Information</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Resume URL</th>
                                                <th>Application Date</th>
                                                <th>Send Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applications as $application)
                                                <tr>
                                                    <td>{{ $application->job->title }}</td>
                                                    <td class="font-weight-bold text-dark">{{ $application->name }}</td>
                                                    <td>{{ $application->email }}</td>
                                                    <td>{{ $application->phone }}</td>
                                                    <td>
                                                        <a href="{{ $application->resume_url }}" target="_blank" class="text-primary">
                                                            View Resume
                                                        </a>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($application->application_date)->format('d-m-Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('application.reply.show',$application->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fas fa-envelope"></i> Send Email
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-{{ $application->status == 'Accepted' ? 'success' : ($application->status == 'Rejected' ? 'danger' : 'warning') }}">
                                                            {{ $application->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="nav-icon fas fa-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                {{-- <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a> --}}
                                                                <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                                {{-- <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View</a> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>Job Information</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Resume URL</th>
                                                <th>Application Date</th>
                                                <th>Send Email</th>
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
