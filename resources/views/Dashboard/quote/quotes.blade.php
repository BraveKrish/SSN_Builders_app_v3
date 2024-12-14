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
        <!-- Header Card -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm bg-light text-dark p-3" >
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-md-6">
                            <h5 class="card-title mb-0">Quotes Request</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New
                            </a>
                        </div>
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
                            <table id="example" class="table table-bordered table-striped text-sm w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Client Information</th>
                                        <th>Project Information</th>
                                        <th>Project Documentation</th>
                                        <th>Submission Date</th>
                                        <th>Estimate Cost</th>
                                        <th>Quotation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $quote)
                                        <tr>
                                            <td>
                                                <i class="fas fa-user"></i> {{ $quote->name }}<br>
                                                <i class="fas fa-envelope"></i> {{ $quote->email }}<br>
                                                <i class="fas fa-phone"></i> (+977) {{ $quote->phone }}
                                            </td>
                                            <td>
                                                <i class="fas fa-clipboard-list"></i> {{ $quote->project_name }}<br>
                                                <i class="fas fa-map-marker-alt"></i> {{ $quote->project_location }}<br>
                                                <i class="fas fa-industry"></i> {{ $quote->project_category }}<br>
                                                <i class="fas fa-file"></i> Other details...
                                            </td>
                                            <td><i class="fas fa-calendar-alt"></i> {{ $quote->project_details_file }}</td>
                                            <td><i class="fas fa-calendar-alt"></i> {{ $quote->submission_date }}</td>
                                            <td><i class="fas fa-dollar-sign"></i> {{ $quote->total_estimate }}</td>
                                            <td>
                                                <a href="{{ route('quotes.prepare', $quote->id) }}" class="btn btn-outline-info btn-sm" style="padding: 5px 15px; border-radius: 5px; font-weight: bold; text-align: center; transition: all 0.3s ease;">
                                                    <i class="fas fa-file" style="margin-right: 5px;"></i> Prepare Quotation
                                                </a>
                                            </td>
                                            
                                            <td>
                                                <span class="badge badge-{{ $quote->status == 'Approved' ? 'success' : 'secondary' }}">
                                                    <i class="fas fa-check-circle"></i> {{ $quote->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a>
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
                                        <th>Client Information</th>
                                        <th>Project Information</th>
                                        <th>Project Documentation</th>
                                        <th>Submission Date</th>
                                        <th>Estimate Cost</th>
                                        <th>Quotation</th>
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
