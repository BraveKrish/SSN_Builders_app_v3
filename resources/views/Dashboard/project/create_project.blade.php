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

        {{-- {{ $projects }} --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card gradient-bg col-12"
                        style="background: linear-gradient(to right, rgb(0, 0, 0), rgb(191, 193, 191)); color: white;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Students List</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- First Row -->
                    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                        <div class="row mx-3 my-3 mt-2">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <form action="{{ route('projects.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-start mb-3">
                                                <button type="submit" class="btn btn-success mr-2 text-white"><i
                                                        class="fas fa-plus"></i> Add</button>
                                                <a href="#" class="btn btn-secondary text-white"><i
                                                        class="fas fa-arrow-left"></i> Go Back</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Enter Project Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter book description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    placeholder="Enter publication year">
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" class="form-control" id="location" name="location">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="badge badge-primary mb-3 p-2">Seller: Seller Name</div>
                                            <div class="badge badge-success mb-3 p-2">Status: Active</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" name="category_id" id="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                @foreach ($status as $key => $statusValue)
                                                    <option value="{{ $key }}">{{ $statusValue }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Row -->
                    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 my-2">
                        <div class="row mx-3 my-3">
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input class="form-control form-control-lg" id="formFileLg" name="image_path"
                                                type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection