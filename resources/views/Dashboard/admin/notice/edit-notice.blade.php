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
                            <li class="breadcrumb-item"><a href="">Notice Update</a></li>
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
                            <form action="{{ route('update.notice',$notice->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="card">
                               
                                  <div class="card-header">
                                      <button type="submit" class="btn btn-primary">
                                          <i class="fas fa-edit"></i> Update
                                      </button>
                                      <a href="{{ route('show.notices') }}" class="btn btn-secondary">
                                          <i class="fas fa-arrow-left"></i> Back
                                      </a>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label for="title">Title</label>
                                          <input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="content">Content</label>
                                          <textarea class="form-control" id="content" name="content" rows="4">{{ $notice->content }}</textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="form-group">
                                        <div class="form-group">
                                            <label for="published_date">Published Date</label>
                                            <input type="date" class="form-control" id="published_date" name="published_date" value="{{ $notice->published_date }}">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="form-group">
                                            <label for="expiry_date">Expiry Date</label>
                                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $notice->expiry_date }}" >
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="form-group">
                                            <label for="expiry_date">Status</label> <br>
                                            @php
                                                $status = $notice->status;
                                                $badgeText = '';
                                                $badgeColor = ''; 

                                                if($status == 1){
                                                    $badgeText = 'Active';
                                                    $badgeColor = 'badge-success';
                                                }else{
                                                    $badgeText = 'Expired';
                                                    $badgeColor = 'badge-danger';
                                                }
                                               
                                            @endphp
                                            <span class="badge {{ $badgeColor }}">{{ $badgeText }}</span>
                                         
                                        </div>
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
                                          <label for="thumbnail">Upload Image</label>
                                          <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
