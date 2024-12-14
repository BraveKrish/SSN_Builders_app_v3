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
                            <li class="breadcrumb-item"><a href="/admin">User Create</a></li>
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
                      
                    <div class="col-12">
                      <!-- Card 1: col-8 and col-4 -->
                      <div class="row mb-4">
                          <div class="col-8">
                            <form action="">
                              <div class="card">
                               
                                  <div class="card-header">
                                      <button type="supmit" class="btn btn-primary">
                                          <i class="fas fa-plus"></i> Add New
                                      </button>
                                      <button type="button" class="btn btn-secondary">
                                          <i class="fas fa-arrow-left"></i> Back
                                      </button>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="title">Title</label>
                                          <input type="text" class="form-control" id="title" name="title">
                                      </div>
                                      <div class="form-group">
                                          <label for="description">Description</label>
                                          <textarea class="form-control" id="description" name="description" rows="4"></textarea>
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
                                              <option value="1">User1</option>
                                              <option value="2">User2</option>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="post_category">Post Category</label>
                                          <select class="form-control" id="post_category" name="post_category">
                                              <!-- Add your categories here -->
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="status">Status</label>
                                          <select class="form-control" id="status" name="status">
                                              <option value="draft">Draft</option>
                                              <option value="published">Published</option>
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
                                          <input type="date" class="form-control" id="published_at" name="published_at">
                                      </div>
                                      <div class="form-group">
                                          <label for="post_type">Post Type</label>
                                          <select class="form-control" id="post_type" name="post_type">
                                              <!-- Add your post types here -->
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
