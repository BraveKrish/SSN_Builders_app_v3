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
                                <h5 class="card-title">Create New Message</h5>
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
                                        <form action="{{ route('application.reply.send',['id' => $application->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-start mb-3">
                                                <button type="submit" class="btn btn-success mr-2 text-white"><i
                                                        class="fas fa-plus"></i> Send</button>
                                                {{-- <a href="#" class="btn btn-secondary text-white"><i
                                                        class="fas fa-arrow-left"></i> Go Back</a> --}}
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="recipient_email">Recipient Email</label>
                                                <input type="email" name="email" class="form-control" id="recipient_email"
                                                    placeholder="Enter recipient email" value="{{ $application->email }}" disabled>

                                            <input type="hidden" name="email" value="{{ $application->email }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" class="form-control" id="subject"
                                                    placeholder="Enter subject">
                                            </div>

                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="attachments">Attachments</label>
                                            <input class="form-control form-control-lg" id="attachments" name="attachments[]"
                                                type="file">
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
