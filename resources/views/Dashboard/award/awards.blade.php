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
                <!-- Info box Card -->
                <div class="row">
                    <div class="card gradient-bg col-12"
                       >
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Awards and Certificates</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('awards.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Table Section -->
                    <div class="col-12 mt-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-sm w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Issued By</th>
                                                <th>Issue Date</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($awards as $award)
                                            <tr class="award-row">
                                                <td class="font-weight-bold text-dark">{{ $award->title }}</td>
                                                <td>{{ $award->description }}</td>
                                                <td>{{ $award->issued_by }}</td>
                                                <td>{{ $award->issue_date }}</td>
                                                <td>{{ $award->category }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $award->status == 'Active' ? 'success' : 'warning' }}">
                                                        {{ $award->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{ route('awards.edit', $award->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View</a>
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
                                                <th>Issued By</th>
                                                <th>Issue Date</th>
                                                <th>Category</th>
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
