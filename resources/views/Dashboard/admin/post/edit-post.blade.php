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
                            <li class="breadcrumb-item"><a href="/admin">Post Update</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    {{-- <div class="col-12"> --}}
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>success!</strong>  {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                    <div class="col-12">
                      <!-- Card 1: col-8 and col-4 -->
                      <div class="row mb-4">
                          <div class="col-8">
                            <form action="{{ route('update.post',$post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="card">
                               
                                  <div class="card-header">
                                      <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                        Update
                                      </button>
                                      <a href="{{ route('show.posts') }}" class="btn btn-secondary">
                                          <i class="fas fa-arrow-left"></i> Back
                                      </a>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="title">Title</label>
                                          <input type="text" class="form-control" id="title" name="title" value="{{  $post->title }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="description">Description</label>
                                          <textarea class="form-control" id="description" name="description" rows="4">{{  $post->description }}"</textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="user_id">User</label>
                                          <select class="form-control" id="user_id" name="user_id">
                                           @foreach ($users as $user)
                                              <option value="{{ $user->id }}" {{ $post->user_id == $user->id ?'selected' : '' }}>{{ $user->name }}</option>
                                           @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="post_category">Post Category</label>
                                          <select class="form-control" id="post_category" name="post_category">
                                            @foreach ($categories as $catKey => $catValue)

                                            <option value="{{ $catValue }}" {{ $post->post_category == $catValue ? 'selected' : '' }}>{{ $catKey }}</option>
                                                
                                            @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="status">Status</label>
                                          <select class="form-control" id="status" name="status">
                                            @foreach ($status as $statusKey => $statusValue)

                                            <option value="{{ $statusValue }}" {{ $post->status == $statusValue ? 'selected' : '' }}>{{ $statusKey }}</option>
                                                
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Card 2: col-8 and col-4 -->
                      <div class="row">
                          <div class="col-8">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="image_url">Image URL</label>
                                          <input type="file" class="form-control-file" id="image_url" name="image_url">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="published_at">Published At</label>
                                          <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ $post->published_at }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="post_type">Post Type</label>
                                          <select class="form-control" id="post_type" name="post_type">
                                             @foreach ($post_type as $postKey => $postValue)

                                             <option value="{{ $postValue }}" {{ $post->post_type == $postValue ? 'selected' : '' }}>{{ $postKey }}</option>
                                                 
                                             @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
                    {{-- </div> --}}
                  

                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
