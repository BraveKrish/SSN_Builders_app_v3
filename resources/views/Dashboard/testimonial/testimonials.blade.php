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
                                <h5 class="mb-0">Testimonials Section</h5>
                                <a href="{{ route('testimonials.create') }}" class="btn btn-primary">
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
                                    <table id="example" class="table table-striped table-bordered text-sm w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Client Name</th>
                                                <th>Position</th>
                                                <th>Office/Company</th>
                                                <th>Testimonials Text</th>
                                                <th>Created Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($testimonials as $testi)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td><img src="{{ $testi->photo_path }}" alt="" class="img-fluid rounded" width="100px"></td>
                                                    <td class="font-weight-bold text-dark">{{ $testi->client_name }}</td>
                                                    <td>{{ $testi->position }}</td>
                                                    <td>{{ $testi->client_company }}</td>
                                                    <td>{{ Str::limit($testi->testimonial_text, 50) }}</td>
                                                    <td>{{ $testi->created_at->format('d-m-Y') }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $testi->status == 1 ? 'success' : 'danger' }}">
                                                            {{ $testi->status == 1 ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('testimonials.edit', $testi->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                                                <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Client Name</th>
                                                <th>Position</th>
                                                <th>Office/Company</th>
                                                <th>Testimonials Text</th>
                                                <th>Created Date</th>
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
