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
                            <li class="breadcrumb-item"><a href="/admin">Notices</a></li>
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
                    <div class="col-12">
                        <div class="card text-white bg-light p-3" style="background: linear-gradient(to right,gray, white );">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    {{-- <p class="mb-0 text-dark">All Users</p> --}}
                                </div>
                                <div>
                                    <a href="{{ route('create.notice') }}" class="btn btn-success px-3">
                                        <i class="fas fa-plus mr-2"></i> Add New Notice
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}

                <div class="row">
                    
                    <div class="col-12">

                        @if (session('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>success!</strong>  {{ session('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Thumbnail</th>
                                        <th>Published Date</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($notices as $notice)
                                    @php
                                    $status =$notice->is_active;
                                    $badgeColor = '';
                            
                                    switch($status) {
                                        case 1:
                                            $badgeColor = 'success';
                                            break;
                                        case 0:
                                            $badgeColor = 'danger';
                                            break;
                                        default:
                                            $badgeColor = 'secondary'; 
                                    }
                                 @endphp
                                      @php
                                          $i++
                                      @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $notice->title }}</td>
                                        <td>{{($notice->content) }}
                                        </span></td>
                                        <td>{{ $notice->thumbnail }}</td>
                                        <td>{{ \Carbon\Carbon::parse($notice->published_date)->format('F j, Y') }}</td>
                                       
                                            <td>{{ \Carbon\Carbon::parse($notice->expiry_date)->format('F j, Y') }}</td>
                                       
                                        <td> @php
                                            if($status == 1) {
                                                $badgeText = 'active';
                                            }else{
                                                $badgeText = 'expired';
                                            }
                                        @endphp <span class="badge badge-{{ $badgeColor }}">
                                            {{ ucfirst($badgeText) }}
                                        </span></td>
                                        
                                        <td>
                                            <a href="{{ route('edit.notice',$notice->id) }}" class="text-warning mr-2"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Thumbnail</th>
                                        <th>Published Date</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>

                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
