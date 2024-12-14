@extends('Dashboard.layout.admin-master')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Project Details Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Project Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Bid Details Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <h5 class="mb-0">Bid Details</h5>
                        </div>
                    </div>

                    {{-- <div class="card col-lg-12 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <strong>Proposal:</strong>
                                    <p>We propose to complete the project within the timeline, maintaining high standards.</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Total Bid Amount:</strong>
                                    <p>$2,000,000</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Payment Terms:</strong>
                                    <p>50% upfront, 50% upon completion.</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Warranties:</strong>
                                    <p>2 years of post-project maintenance.</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Date of Signing:</strong>
                                    <p>February 10, 2024</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <strong>Attachments:</strong><br>
                                    <a href="#" class="btn btn-success">
                                        <i class="fas fa-file-download"></i> Download Attachments
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <strong>Status:</strong>
                                    <span class="badge bg-primary">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @include('Dashboard.includes.alert')
                    <div class="card col-lg-12 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <strong>Proposal:</strong>
                                    <p>{{ $proposal->proposal }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Total Bid Amount:</strong>
                                    <p>${{ $proposal->total_bid_amount }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Payment Terms:</strong>
                                    <p>{{ $proposal->payment_terms }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Warranties:</strong>
                                    <p>{{ $proposal->warranties }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Date of Signing:</strong>
                                    <p>{{ $proposal->date_of_signing }}</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <strong>Attachments:</strong><br>
                                    <a href="{{ $proposal->date_of_signing }}" class="btn btn-success">
                                        <i class="fas fa-file-download"></i> Download Attachments
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <strong>Status:</strong>
                                    <span class="badge bg-primary text-capitalize">{{ $proposal->status }}</span>
                                </div>
                            </div>
                    
                            <!-- Status Update Form -->
                            <div class="mt-4">
                                <form action="{{ route('update.bid.status', ['id' => $proposal->id]) }}" method="POST">
                                    {{-- <form action=""></form> --}}
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div class="form-group">
                                        <label for="status">Change Status:</label>
                                        <select name="status" id="status" class="form-control">
                                            @foreach ($status as $key => $value)
                                             <option value="{{ $key }}" {{ oldSelect($key, old('status', $proposal->status)) }}>{{ $value }}</option>
                                            @endforeach
                                            {{-- <option value="under_review" {{ $bid->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                            <option value="accepted" {{ $bid->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                            <option value="rejected" {{ $bid->status == 'rejected' ? 'selected' : '' }}>Rejected</option> --}}
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fas fa-save"></i> Update Status
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Project Details Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <h5 class="mb-0">Project Details</h5>
                        </div>
                    </div>

                    <div class="card col-lg-12 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Project Name:</strong>
                                    <p>{{ $proposal->project->name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Location:</strong>
                                    <p>{{ $proposal->project->location }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Start Date:</strong>
                                    <p>{{ $proposal->project->start_date }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>End Date:</strong>
                                    <p>{{ $proposal->project->end_date }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Status:</strong>
                                    <span class="badge bg-success">{{ $proposal->project->status }}</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Project Category:</strong>
                                    <p>{{ $category->title }}</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <strong>Description:</strong>
                                    <p>{{ $proposal->project->description }}</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <strong>Project Image:</strong><br>
                                    <img src="{{ asset($proposal->project->image_path) }}" alt="Project Image" class="img-fluid" width="400">
                                </div>
                                <div class="col-12">
                                    <strong>Project Plans:</strong><br>
                                    <a href="#" class="btn btn-info">
                                        <i class="fas fa-download"></i> Download Plans
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subcontractor Details Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <h5 class="mb-0">Subcontractor Details</h5>
                        </div>
                    </div>

                    <div class="card col-lg-12 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Company Name:</strong>
                                    <p>{{ $proposal->subcontractor->company_name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Company Address:</strong>
                                    <p>{{ $proposal->subcontractor->company_address }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>City:</strong>
                                    <p>{{ $proposal->subcontractor->city }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Contact Person:</strong>
                                    <p>{{ $proposal->subcontractor->contact_person_name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Email:</strong>
                                    <p>{{ $proposal->subcontractor->contact_person_email }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Business License Number:</strong>
                                    <p>{{ $proposal->subcontractor->business_license_number }}</p>
                                </div>
                                <div class="col-12 mb-3">
                                    <strong>Certifications:</strong>
                                    <p>{{ $proposal->subcontractor->certifications }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Business License File:</strong><br>
                                    <a href="{{ $proposal->subcontractor->business_license_file }}" class="btn btn-success">
                                        <i class="fas fa-file-download"></i> Download License
                                    </a>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Insurance Certificate File:</strong><br>
                                    <a href="{{ $proposal->subcontractor->insurance_certificate_file }}" class="btn btn-success">
                                        <i class="fas fa-file-download"></i> Download Certificate
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
