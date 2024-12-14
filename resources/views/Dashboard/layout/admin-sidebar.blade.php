 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin Dashboard</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="" class="d-block">SSN Administration</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 {{-- <li class="nav-item menu-open"> --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                 {{-- <li class="nav-item">
                     <a href="#" class="nav-link active">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/admin" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Product</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sales</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/admin" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Revenue</p>
                             </a>
                         </li>
                     </ul>
                 </li> --}}
                 <li class="nav-item">
                     <a href="{{ route('users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                         <p>
                             Users
                             <span class="right badge badge-danger">New</span>
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">SSN Projects</li>
                 <li class="nav-item ">
                    {{-- active menu-open--}}
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-hard-hat"></i>

                        <p>
                            Projects & Contractors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('projects.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Projects
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ route('open.project') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Open Project(s)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contractors.proposal') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Contractors Proposal
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Revenue</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                {{-- <li class="nav-header">Sub Contractors</li> --}}
                 {{-- <li class="nav-item">
                     <a href="{{ route('contractors.proposal') }}" class="nav-link">
                         <i class="nav-icon fas fa-file-alt"></i>
                         <p>
                             Contractors Proposal
                         </p>
                     </a>
                 </li> --}}
                 <li class="nav-item">
                     <a href="{{ route('services.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>

                         <p>
                             Services
                         </p>
                     </a>
                 </li>


                 <li class="nav-item">
                     <a href="{{ route('posts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                         <p>
                             Posts
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('jobs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>

                         <p>
                             Jobs Listing
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('show.applications') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>

                         <p>
                             Job Applications
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('quotes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                         <p>
                             Quotes Request
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('awards.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        {{-- <i class="nav-icon fas fa-medal"></i> --}}
                         <p style="font-size: 15px;">
                             Awards And Certifications
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('subscribers') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                         <p>
                             Subscribers
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('teams.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                         <p>
                             Teams
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('testimonials.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-quote-left"></i>
                         <p>
                             Testimonials
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                    <a href="{{ route('company.profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>

                        <p>
                            Site Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>


                        <p>
                            Contacts
                        </p>
                    </a>
                </li>

                 <li class="nav-header">Sub Contractors</li>
                 <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="nav-link">
                           <i class="nav-icon fas fa-sign-out-alt"></i>
                           <p>{{ __('Log Out') }}</p>
                        </a>
                    </form>
                </li>
                
             

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
