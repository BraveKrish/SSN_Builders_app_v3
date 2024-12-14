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
                <!-- Header -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Projects</h5>
                                <a href="{{ route('projects.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus mr-2"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Table Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover table-bordered table-striped text-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Location</th>
                                                <th>Open for Subcontractors</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <!-- Bold title and color differentiation for dates and status -->
                                                    <td class="font-weight-bold text-dark">{{ $project->name }}</td>
                                                    <td>{{ $project->category->title }}</td>
                                                    <td>{{ Str::limit($project->description, 50) }}</td>
                                                    <td class="text-info">{{ $project->start_date }}</td>
                                                    <td class="text-info">{{ $project->end_date }}</td>
                                                    <td>{{ $project->location }}</td>
                                                    <td>
                                                        <a href="{{ route('contractor.show', $project->id) }}" class="btn btn-outline-info btn-sm">Open Now</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $project->status == 'Completed' ? 'badge-success' : 'badge-secondary' }}">
                                                            {{ $project->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                                <i class="nav-icon fas fa-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('projects.edit', $project->id) }}">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <form method="POST" action="{{ route('projects.destroy', $project->id) }}" id="delete-form-{{ $project->id }}" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                <a class="dropdown-item text-danger delete-btn" href="#" data-id="{{ $project->id }}">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Location</th>
                                                <th>Open for Subcontractors</th>
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

<script>
    @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif
</script>
    </div>
@endsection
