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
                                <h5 class="mb-0">Team Members</h5>
                                <a href="{{ route('teams.create') }}" class="btn btn-primary">
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
                                    <table id="example" class="table table-striped table-bordered text-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Bio</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Linkedin Profile</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($teams as $team)
                                                <tr>
                                                    <td><img src="{{ asset($team->photo_path) }}" alt="Team Photo" class="img-fluid rounded" width="60" height="auto"></td>
                                                    <td class="font-weight-bold text-dark">{{ $team->name }}</td>
                                                    <td>{{ $team->position }}</td>
                                                    <td>{{ $team->bio }}</td>
                                                    <td>{{ $team->email }}</td>
                                                    <td>{{ $team->phone }}</td>
                                                    <td>{{ $team->linkedin_profile }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $team->status == 'Active' ? 'success' : 'danger' }}">
                                                            {{ $team->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('teams.edit', $team->id) }}"><i class="fas fa-edit"></i> Edit</a>
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
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Bio</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Linkedin Profile</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/. row -->
            </div><!--/. container-fluid -->
        </section>
        
        
    </div>
@endsection
