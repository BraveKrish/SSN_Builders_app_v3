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
                {{-- {{ $quote }} --}}
                @php
                    if (session('form_data')) {
                        $formData = session('form_data');
                    }

                @endphp
                {{-- {{ dd($formData) }} --}}
                <div class="row">
                    <div class="card gradient-bg col-12"
                        style="background: linear-gradient(to right, rgb(0, 0, 0), rgb(191, 193, 191)); color: white;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Generate/Upload Quote Response</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- First Row -->
                    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                        <div class="row mx-3 my-3 mt-2">
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <form action="{{ route('quote.response.send') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-start mb-3">
                                                <button type="submit" name="action" value="save"
                                                    class="btn btn-success mr-2 text-white"><i class="fas fa-plus"></i>
                                                    Save</button>
                                                <button type="submit" name="action" value="preview_pdf"
                                                    class="btn btn-warning mr-2 text-white"><i class="fas fa-plus"></i>
                                                    Preview PDF</button>
                                                {{-- <a href="#" class="btn btn-secondary text-white"><i
                                                        class="fas fa-arrow-left"></i> Preview PDF</a> --}}
                                                <button type="submit" name="action" value="generate_send"
                                                    class="btn btn-success ml-2 text-white"><i class="fas fa-info"></i>
                                                    Generate PFD And Send Email</button>
                                            </div>
                                            <div class="hiddenfields">
                                                <input type="hidden" name="quote_id" value="{{ $quote->id }}">
                                                <input type="hidden" name="name" value="{{ $quote->name }}">
                                                <input type="hidden" name="email" value="{{ $quote->email }}">
                                                <input type="hidden" name="phone" value="{{ $quote->phone }}">
                                                <input type="hidden" name="project_name"
                                                    value="{{ $quote->project_name }}">
                                                <input type="hidden" name="project_category"
                                                    value="{{ $quote->project_category }}">
                                                <input type="hidden" name="project_location"
                                                    value="{{ $quote->project_location }}">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="checkbox" class="form-control" id="quantity" name="quantity">
                                                <label for="quantity">Check if applicable</label>
                                            </div> --}}

                                            {{-- <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckIndeterminate">
                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                    Generate PDF And Send Email
                                                </label>
                                            </div> --}}

                                            <div class="form-group">
                                                <label for="total_cost">Total Cost</label>
                                                <input type="number" name="total_cost" class="form-control" id="total_cost"
                                                    placeholder="Enter total_cost">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="author">Cost Breakdown</label>
                                                <input type="text" name="author" class="form-control" id="author"
                                                    placeholder="Enter author name">
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="description">Cost Breakdown</label>
                                                <textarea class="form-control" name="cost_breakdown" id="cost_breakdown" rows="3" placeholder="Cost Breakdown "></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="timeline_estimate">Timeline Estimate</label>
                                                <textarea class="form-control" name="timeline_estimate" id="timeline_estimate" rows="3"
                                                    placeholder="Timeline Estimate "></textarea>
                                            </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="badge badge-primary mb-3 p-2">Seller: Seller Name</div>
                                            <div class="badge badge-success mb-3 p-2">Status: Active</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="terms_and_conditions">Terms & Conditions</label>
                                            <textarea class="form-control" name="terms_and_conditions" id="terms_and_conditions" rows="3"
                                                placeholder="Terms and Conditions "></textarea>
                                        </div>


                                        {{-- <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" name="category_id" id="category">
                                                <option value="#">Category Name</option>
                                            </select>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                placeholder="Enter quantity">
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label for="publicationYear">Publication Year</label>
                                            <input type="date" class="form-control" id="publicationYear"
                                                name="publication_year" placeholder="Enter publication year">
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                placeholder="Enter price">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Row -->
                    <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12 my-2">
                        <div class="row mx-3 my-3">

                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        {{-- <div class="form-group">
                                            <label for="image">Image</label>
                                            <input class="form-control form-control-lg" id="formFileLg" name="image_url"
                                                type="file">
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="additional_notes">Additional Notes</label>
                                            <textarea class="form-control" name="additional_notes" id="additional_notes" rows="3"
                                                placeholder="Additional Notes"></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>
@endsection
