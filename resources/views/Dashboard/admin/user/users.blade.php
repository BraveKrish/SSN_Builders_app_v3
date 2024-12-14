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
                            <li class="breadcrumb-item"><a href="/admin">User</a></li>
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
                                    <a href="#" class="btn btn-success px-3">
                                        <i class="fas fa-plus mr-2"></i> Add New User
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Post Category</th>
                                        <th>Description</th>
                                        <th>Image URL</th>
                                        <th>Post Type</th>
                                        <th>Status</th>
                                        <th>Published At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sample Title 1</td>
                                        <td>sample-title-1</td>
                                        <td>Category 1</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>http://example.com/image1.jpg</td>
                                        <td>Type 1</td>
                                        <td>Active</td>
                                        <td>2023-01-01</td>
                                        <td>
                                            <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger ml-2"><i class="fas fa-trash"></i></a>
                                            <div class="dropdown d-inline">
                                                <a class="text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-archive mr-2"></i>Archive Record</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i>View Record</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sample Title 2</td>
                                        <td>sample-title-2</td>
                                        <td>Category 2</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>http://example.com/image2.jpg</td>
                                        <td>Type 2</td>
                                        <td>Inactive</td>
                                        <td>2023-02-01</td>
                                        <td>
                                            <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger ml-2"><i class="fas fa-trash"></i></a>
                                            <div class="dropdown d-inline">
                                                <a class="text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-archive mr-2"></i>Archive Record</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i>View Record</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sample Title 3</td>
                                        <td>sample-title-3</td>
                                        <td>Category 3</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>http://example.com/image3.jpg</td>
                                        <td>Type 3</td>
                                        <td>Pending</td>
                                        <td>2023-03-01</td>
                                        <td>
                                            <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-danger ml-2"><i class="fas fa-trash"></i></a>
                                            <div class="dropdown d-inline">
                                                <a class="text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-archive mr-2"></i>Archive Record</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i>View Record</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Post Category</th>
                                        <th>Description</th>
                                        <th>Image URL</th>
                                        <th>Post Type</th>
                                        <th>Status</th>
                                        <th>Published At</th>
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
