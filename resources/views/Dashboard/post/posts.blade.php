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

        {{-- {{ $posts }} --}}

        <section class="content">
            <div class="container-fluid">
                <!-- Header Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Posts</h5>
                                <a href="{{ route('posts.create') }}" class="btn btn-primary">
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
                                                <th>Thumbnail</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Contents</th>
                                                <th>Post Type</th>
                                                <th>Created Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td><img src="{{ $post->image_path }}" alt="Thumbnail" class="img-fluid rounded" width="60" height="auto"></td>
                                                    <td class="font-weight-bold text-dark">{{ $post->title }}</td>
                                                    <td>{{ $post->author }}</td>
                                                    <td>{{ Str::limit($post->content, 50) }}</td>
                                                    <td>{{ $post->post_type }}</td>
                                                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $post->status == 'Published' ? 'success' : 'secondary' }}">
                                                            {{ $post->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-edit"></i> Edit</a>
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
                                                <th>Thumbnail</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Contents</th>
                                                <th>Post Type</th>
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
