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
                        <div class="card shadow-sm bg-light text-dark p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Messages</h5>
                                {{-- <a href="#" class="btn btn-primary">
                                    <i class="fas fa-plus mr-2"></i> Add New Message
                                </a> --}}
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
                                    <table id="example" class="table table-striped table-bordered text-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                            <tr>
                                                <td class="font-weight-bold text-dark">{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                <td>{{ $contact->message }}</td>
                                                <td><span class="badge {{ $contact->status ? 'badge-success' : 'badge-warning'  }} ">{{ $contact->status ? 'Responded' : 'Pending' }}</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="nav-icon fas fa-cog"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{ route('contact.reply.show',$contact->id) }}"><i class="fas fa-reply"></i> Reply</a>
                                                            <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View Reply</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Subject</th>
                                                <th>Message</th>
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

            {{-- bootstrap model for contact reply --}}
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Reply to Contact</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Reply Form Starts Here -->
                      <form id="replyForm" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="recipientEmail">Recipient Email</label>
                          <input type="email" class="form-control" id="recipientEmail" placeholder="Enter recipient's email" required>
                        </div>
                        <div class="form-group">
                          <label for="subject">Subject</label>
                          <input type="text" class="form-control" id="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="form-group">
                          <label for="message">Message</label>
                          <textarea class="form-control" id="message" rows="5" placeholder="Write your reply" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="attachment">Attachment (optional)</label>
                          <input type="file" class="form-control-file" id="attachment">
                        </div>
                      </form>
                      <!-- Reply Form Ends Here -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" form="replyForm">Send Reply</button>
                    </div>
                  </div>
                </div>
              </div> --}}
              

           
        </section>
    </div>
@endsection
