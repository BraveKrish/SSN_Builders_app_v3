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
                <div class="row">
                    <!-- Project Details Card -->
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Subcontractor Projects Details</h5>
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Back to Projects
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Project Information Section -->
                    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                        <div class="card-body">
                            <!-- Project Name -->
                            <div class="border p-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <strong>Project Name:</strong>
                                    <span>{{ $project->name }}</span>
                                </div>
                            </div>
        
                            <!-- Project Description -->
                            <div class="border p-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <strong>Description:</strong>
                                    <span>{{ $project->description }}</span>
                                </div>
                            </div>
        
                            <!-- Project Location and Dates -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-between">
                                            <strong>Location:</strong>
                                            <span>{{ $project->location }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-between">
                                            <strong>Start Date:</strong>
                                            <span>{{ $project->start_date }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-between">
                                            <strong>End Date:</strong>
                                            <span>{{ $project->end_date }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-between">
                                            <strong>Other Requirements:</strong>
                                            <span>{{ $project->ohter_requirements }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-between">
                                            <strong>Subcontractor Category:</strong>
                                            <span>{{ $project->category->title }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="border p-3">
                                        <div class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span><span class="badge bg-success text-capitalize">{{ $project->status }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Project Image -->
                            <div class="mt-4">
                                <strong>Project Image:</strong><br>
                                <img src="{{ asset($project->image_path) }}" alt="Project Image" class="img-fluid" width="400">
                            </div>
        
                            <!-- Project Plans -->
                            <div class="mt-3">
                                <strong>Project Plans:</strong><br>
                                <a href="#" target="_blank" class="btn btn-info">
                                    <i class="fas fa-download"></i> Download Plans
                                </a>
                            </div>
        
                            <!-- Files Section -->
                            <h5 class="mt-4">Attached Files for Subcontractors</h5>
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>File</th>
                                            <th>Other Requirements</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                            
                                        
                                        <tr>
                                            <td>{{ $file->file_name }}</td>
                                            <td>
                                                <a href="{{ asset($file->file_path) }}" target="_blank" class="btn btn-success">
                                                    <i class="fas fa-file-download"></i> Download
                                                </a>
                                            </td>
                                            <td>{{ $file->other_requirements }}</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
    </div>
@endsection
