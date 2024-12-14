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
                    <div class="card col-12"
                        style="background: linear-gradient(to right, rgb(0, 0, 0), rgb(191, 193, 191)); color: white;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Subcontractors Proposal</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-12">
                        @include('Dashboard.includes.alert')
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover" style="width:100%; font-size: 0.875rem;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Project Details</th>
                                        <th>Subcontractor Details</th>
                                        <th>Proposal & Bid</th>
                                        <th>Breakdown of Costs</th>
                                        <th>Payment Terms</th>
                                        <th>Warranties</th>
                                        <th>Signature & Date</th>
                                        <th>Attachments</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        <tr style="background-color: #f8f9fa; transition: background-color 0.3s ease;">
                                            <td>
                                                <strong>{{ $proposal->project->name }}</strong> <br>
                                                <small>Start Date:</small> {{ $proposal->project->start_date }}<br>
                                                <small>End Date:</small> {{ $proposal->project->end_date }}
                                            </td>
                                            <td>
                                                <strong>{{ $proposal->subcontractor->company_name }}</strong><br>
                                                <small>Address:</small> {{ $proposal->subcontractor->company_address }}
                                            </td>
                                            <td>
                                                <strong>{{ $proposal->proposal }}</strong> <br>
                                                <small>Total Bid Amount:</small> ${{ $proposal->total_bid_amount }}
                                            </td>
                                            <td>
                                                Labor: $500,000<br>
                                                Materials: $400,000<br>
                                                Equipment: $300,000
                                            </td>
                                            <td>50% upfront, 25% mid-project, 25% upon completion</td>
                                            <td>2 years on labor and materials</td>
                                            <td>
                                                <strong>Signature:</strong> John Doe<br>
                                                <small>Date of Signing:</small> 2024-08-15
                                            </td>
                                            <td>Contract.pdf, Insurance.pdf</td>
                                            <td>
                                                <span class="badge badge-{{ $proposal->status == 'Approved' ? 'success' : 'secondary' }}">
                                                    {{ $proposal->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="nav-icon fas fa-cog"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{ route('contractors.proposal.review', $proposal->id) }}"><i class="fas fa-edit"></i> Review</a>
                                                        <form method="POST" action="{{ route('delete.proposal', $proposal->id) }}" id="delete-form-{{ $proposal->id }}" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a class="dropdown-item text-danger delete-btn" href="#" data-id="{{ $proposal->id }}">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </a>
                                                        {{-- <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View</a> --}}
                                                        <form action="{{ route('accept.bid') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="bid_id" value="{{ $proposal->id }}">
                                                            <button role="button" type="submit" class="dropdown-item" style="border: none; background: none; padding: 0;">
                                                                <i class="fas fa-check"></i> Accept Proposal
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th>Project Details</th>
                                        <th>Subcontractor Details</th>
                                        <th>Proposal & Bid</th>
                                        <th>Breakdown of Costs</th>
                                        <th>Payment Terms</th>
                                        <th>Warranties</th>
                                        <th>Signature & Date</th>
                                        <th>Attachments</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const projectId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${projectId}`).submit();
                        }
                    });
                });
            });
        </script>
        
    </div>
@endsection
