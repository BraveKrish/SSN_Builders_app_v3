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
                            <li class="breadcrumb-item"><a href="">Team Create</a></li>
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
                      @if (session('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>success!</strong>  {{ session('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif
                      <div class="row mb-4">
                           
                          <div class="col-8">
                            <form action="{{ route('store.team') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="card">
                               
                                  <div class="card-header">
                                      <button type="submit" class="btn btn-primary">
                                          <i class="fas fa-plus"></i> Add New
                                      </button>
                                      <a href="{{ route('show.teams') }}" class="btn btn-secondary">
                                          <i class="fas fa-arrow-left"></i> Back
                                      </a>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" class="form-control" id="name" name="name">
                                      </div>
                                      <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" id="contact" name="contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="role" name="role">
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="form-group">
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <select class="form-control" id="position" name="position">
                                                @foreach ($postions as $pKey =>  $pValue)
                                                <option value="{{ $pKey }}">{{ $pValue }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="is_active">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                      </div>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Card 2: col-8 and col-4 -->
                      {{-- <div class="row">
                          <div class="col-8">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="thumbnail">Upload Photo</label>
                                          <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                    </form>
                  </div>
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
