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
                    <div class="card gradient-bg col-12"
                        style="background: linear-gradient(to right, rgb(0, 0, 0), rgb(191, 193, 191)); color: white;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Manage Students Application</h5>
                            </div>
                            {{-- <div class="col-md-6 text-right">
                                <a href="{{ route('applications.index') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
