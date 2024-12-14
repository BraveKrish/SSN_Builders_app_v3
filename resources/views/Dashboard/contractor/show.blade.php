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
        @include('Dashboard.includes.alert')
        
        <!-- Project Management Card -->
        <div class="row">
            <div class="card col-12 shadow-sm gradient-bg"
                style="background: linear-gradient(to right, #343a40, #6c757d); color: white;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="col-md-6">
                        <h5 class="card-title">Manage Project and Open it for SubContractors</h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <form action="{{ route('open.forContractor') }}" method="POST">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ request()->route('id') }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i> List Project for Subcontractor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Status and File Upload Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h5 class="card-title">
                    Additional Documents for Subcontractors
                    @if($openStatus)
                        <span class="badge badge-success">Opened for Contractor</span>
                    @else
                        <span class="badge badge-danger">Closed for Contractor</span>
                    @endif
                </h5>
            </div>
        </div>

        <div class="row">
            <!-- File Upload Form -->
            <div class="col-lg-6 col-md-12 mt-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('contractor.file.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $id }}">
                            
                            <div class="d-flex justify-content-start mb-3">
                                <button type="submit" class="btn btn-success me-2">
                                    <i class="fas fa-file-upload"></i> Save
                                </button>
                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Go Back
                                </a>
                            </div>
                            
                            <div class="form-group">
                                <label for="file_name">File Name</label>
                                <input type="text" name="file_name" class="form-control" id="file_name"
                                    placeholder="Enter file name">
                            </div>
                            <div class="form-group">
                                <label for="file_path">Upload File</label>
                                <input type="file" name="file_path" class="form-control" id="file_path">
                            </div>
                            <div class="form-group">
                                <label for="other_requirements">Other Requirements (Optional)</label>
                                <textarea class="form-control" name="other_requirements" id="other_requirements" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Uploaded Files Table -->
            <div class="col-lg-6 col-md-12 mt-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Uploaded Documents</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File Name</th>
                                        <th>File Path</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($files as $file)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $file->file_name }}</td>
                                            <td>
                                                <a href="{{ asset($file->file_path) }}" target="_blank" class="text-primary">
                                                    View File
                                                </a>
                                            </td>
                                            <td>
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($files) == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">No files uploaded yet.</td>
                                        </tr>
                                    @endif
                                </tbody>
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
