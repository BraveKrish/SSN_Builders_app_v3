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
                    <div class="card gradient-bg col-12"
                        style="background: linear-gradient(to right, rgb(0, 0, 0), rgb(191, 193, 191)); color: white;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Create Awards and Certifications</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="" class="btn btn-primary">
                                    <i class="fas fa-pen"></i> Update
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
                                        <form action="{{ route('awards.update', $award->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex justify-content-start mb-3">
                                                <button type="submit" class="btn btn-success mr-2 text-white"><i
                                                        class="fas fa-edit"></i> Update</button>
                                                <a href="{{ route('awards.index') }}"
                                                    class="btn btn-secondary text-white"><i class="fas fa-arrow-left"></i>
                                                    Go Back</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="Enter title" value="{{ $award->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="author">Issued By</label>
                                                <input type="text" name="issued_by" class="form-control" id="issued_by"
                                                    placeholder="Enter issued_by name" value="{{ $award->issued_by }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description">{{ $award->description }}</textarea>
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
                                            <select class="form-control" name="category" id="category">
                                                @foreach ($categories as $category)
                                                    <option
                                                        {{ oldSelect($category->id, old('category', $award->category)) }}
                                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="issued_date">Issued Date</label>
                                            <input type="date" class="form-control" id="issue_date" name="issue_date"
                                                placeholder="Enter publication year" value="{{ $award->issue_date }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="active">Active</option>
                                                <option value="archived">Archived</option>
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
                                            <label for="image">Award Files</label>
                                            <input class="form-control form-control-lg" id="formFileLg" multiple
                                                name="awards_files[]" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- {{ $award }} --}}
                            {{-- {{ dd($award->awards_files) }} --}}
                        </div>

                        <div class="row">

                            @if (!empty($award->awards_files) && is_iterable($award->awards_files))
                                @foreach ($award->awards_files as $file)
                                    <div class="col-lg-3">
                                        {{-- <p>{{ asset($file->file_path) }}</p> --}}
                                        <img class="ml-3 my-2" src="{{ asset($file->file_path) }}" alt="Award Image"
                                            class="award-image" height="200px" width="auto" />
                                    </div>
                                @endforeach
                            @else
                                <p>No images available.</p>
                            @endif
                        </div>



                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="col-3">
                                    @if (!empty($award->awards_files) && is_iterable($award->awards_files))
                                        @foreach ($award->awards_files as $file)
                                            <p>{{ asset($file->file_path) }}</p>
                                            <img src="{{ asset($file->file_path) }}" alt="Award Image"
                                                class="award-image" />
                                        @endforeach
                                    @else
                                        <p>No images available.</p>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>
@endsection
