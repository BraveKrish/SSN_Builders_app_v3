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
                <!-- Header Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Users</h5>
                                <a href="#" class="btn btn-success px-3">
                                    <i class="fas fa-plus mr-2"></i> Add New User
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="card gradient-bg p-3" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="text-dark mb-0"> Users</h5>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-success px-3">
                                        <i class="fas fa-plus mr-2"></i> Add New User
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
        
                <!-- Table Section -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Email Verified</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold text-dark">John Doe</td>
                                                <td>john.doe@example.com</td>
                                                <td>Admin</td>
                                                <td>
                                                    <span class="badge badge-success">Verified</span>
                                                </td>
                                                <td>
                                                    <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="text-danger ml-2"><i class="fas fa-trash"></i></a>
                                                    <div class="dropdown d-inline">
                                                        <a class="text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-user-shield mr-2"></i> Promote to Super Admin</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-ban mr-2"></i> Disable Account</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold text-dark">Jane Smith</td>
                                                <td>jane.smith@example.com</td>
                                                <td>User</td>
                                                <td>
                                                    <span class="badge badge-danger">Not Verified</span>
                                                </td>
                                                <td>
                                                    <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="text-danger ml-2"><i class="fas fa-trash"></i></a>
                                                    <div class="dropdown d-inline">
                                                        <a class="text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-user-shield mr-2"></i> Promote to Admin</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-ban mr-2"></i> Disable Account</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Email Verified</th>
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
        
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
