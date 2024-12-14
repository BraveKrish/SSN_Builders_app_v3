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
                                <h5 class="card-title">Update Site Information</h5>
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
                                        <form action="{{ route('update.site.profile',['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="d-flex justify-content-start mb-3">
                                                <button type="submit" class="btn btn-success mr-2 text-white"><i
                                                        class="fas fa-save"></i> Save</button>
                                                <a href="#" class="btn btn-secondary text-white"><i
                                                        class="fas fa-arrow-left"></i> Go Back</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="about_us">About Us</label>
                                                <textarea class="form-control" name="about_us" id="about_us" rows="3" placeholder="Enter about us information">{{ $profile->about_us }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="contact_no">Contact Number</label>
                                                <input type="text" name="contact_no" class="form-control" id="contact_no"
                                                    placeholder="Enter contact number" value="{{ $profile->contact_no }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Enter email" value="{{ $profile->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="secondary_email">Secondary Email</label>
                                                <input type="email" name="secondary_email" class="form-control" id="secondary_email"
                                                    placeholder="Enter secondary email" value="{{ $profile->secondary_email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" name="location" class="form-control" id="location"
                                                    placeholder="Enter location" value="{{ $profile->location }}">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="facebook_link">Facebook Link</label>
                                            <input type="url" name="facebook_link" class="form-control" id="facebook_link"
                                                placeholder="Enter Facebook profile link" value="{{ $profile->facebook_link }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin_link">LinkedIn Link</label>
                                            <input type="url" name="linkedin_link" class="form-control" id="linkedin_link"
                                                placeholder="Enter LinkedIn profile link" value="{{ $profile->linkedin_link }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="whatsapp_link">WhatsApp Link</label>
                                            <input type="url" name="whatsapp_link" class="form-control" id="whatsapp_link"
                                                placeholder="Enter WhatsApp link" value="{{ $profile->whatsapp_link }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube_link">YouTube Link</label>
                                            <input type="url" name="youtube_link" class="form-control" id="youtube_link"
                                                placeholder="Enter YouTube channel link" value="{{ $profile->youtube_link }}">
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
