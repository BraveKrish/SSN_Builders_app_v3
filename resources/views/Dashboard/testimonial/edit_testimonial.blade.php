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
                <div class="row">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card gradient-bg col-12"
                        style="background: linear-gradient(to right, rgb(0, 0, 0), rgb(191, 193, 191)); color: white;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Create</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- {{ $testimonial }} --}}
                    <!-- First Row -->
                    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                        <div class="row mx-3 my-3 mt-2">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex justify-content-start mb-3">
                                                <button type="submit" class="btn btn-success mr-2 text-white"><i
                                                        class="fas fa-pen"></i> Update</button>
                                                <a href="{{ route('testimonials.index') }}"
                                                    class="btn btn-secondary text-white"><i class="fas fa-arrow-left"></i>
                                                    Go Back</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="client_name">Client Name</label>
                                                <input type="text" name="client_name" class="form-control"
                                                    id="client_name" placeholder="Enter  client_name"
                                                    value="{{ $testimonial->client_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="author">Client Company(Optional)</label>
                                                <input type="text" name="client_company" class="form-control"
                                                    id="client_company" placeholder="Enter client_company"
                                                    value="{{ $testimonial->client_company }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="testimonial_text">Testimonail Text</label>
                                                <textarea class="form-control" name="testimonial_text" id="testimonial_text" rows="3"
                                                    placeholder="Enter Testimonail Text">{{ $testimonial->testimonial_text }}</textarea>
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
                                            <label for="position">Position</label>
                                            <select class="form-control" name="position" id="position">
                                                @foreach ($positions as $key => $value)
                                                    <option {{ oldSelect($testimonial->position, old('position', $key)) }}
                                                        value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option {{ oldSelect($testimonial->status, old('position', 1)) }}
                                                    value="1">Published
                                                </option>
                                                <option {{ oldSelect($testimonial->status, old('position', 0)) }}
                                                    value="0">Un-Published</option>
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
                            <div class="col-9">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="photo_path">Upload Photo(Optional)</label>
                                            <input class="form-control form-control-lg" id="photo_path" name="photo_path"
                                                type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <img src="{{ $testimonial->photo_path }}" alt="testimonial image" height="auto"
                                            width="200px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>
@endsection
