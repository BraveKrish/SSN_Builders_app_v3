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
                                <h5 class="mb-0">Jobs/Career</h5>
                                <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus mr-2"></i> Add New
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
                                    <table id="example" class="table table-bordered table-striped text-sm w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Job Type</th>
                                                <th>Job Category</th>
                                                <th>Posted Date</th>
                                                <th>Location</th>
                                                <th>Application Deadline</th>
                                                <th>Level</th>
                                                <th>Job Applications</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobs as $job)
                                                <tr>
                                                    <td class="font-weight-bold text-dark">{{ $job->title }}</td>
                                                    <td>{{ Str::limit($job->description, 50) }}</td>
                                                    <td>{{ $job->job_type }}</td>
                                                    <td>{{ $job->job_category }}</td>
                                                    <td>{{ $job->posted_date }}</td>
                                                    <td>{{ $job->location }}</td>
                                                    <td>{{ $job->application_deadline }}</td>
                                                    <td>{{ $job->level }}</td>
                                                    <td>
                                                        <a href="{{ route('jobs.application', $job->id) }}" class="btn btn-info btn-sm" style="border: 1px solid #17a2b8; padding: 3px 8px;">
                                                            <span><i class="fas fa-eye"></i> Applicants</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-{{ $job->status == 'Active' ? 'success' : 'secondary' }}">
                                                            {{ $job->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('jobs.edit', $job->id) }}">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <a class="dropdown-item text-danger" href="#">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Job Type</th>
                                                <th>Job Category</th>
                                                <th>Posted Date</th>
                                                <th>Location</th>
                                                <th>Application Deadline</th>
                                                <th>Level</th>
                                                <th>Job Applications</th>
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
