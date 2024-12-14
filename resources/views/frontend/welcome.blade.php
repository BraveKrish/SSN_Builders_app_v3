<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SSN Group</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('welcome/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('welcome/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('welcome/lib/animate/animate.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('welcome/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('welcome/css/style.css') }}" rel="stylesheet">

        

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
            <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px ; background-color: #170056 !important;">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Holly Springs, North Carolina 27540</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">info@ssnbuilders.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-secondary"></i></a>
                        <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-twitter text-secondary"></i></a>
                        <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                        <a href="" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-secondary"></i></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl py-2">
                    <a href="index.html" class="navbar-brand"><img src="{{ asset('welcome/img/logo11.png') }}" height="80px"> </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        
                        <div class="d-flex me-4">
                            <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                                <a href="" class="position-relative wow tada" data-wow-delay=".9s" >
                                    <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                                    <div class="position-absolute" style="top: -7px; left: 20px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column text-right pe-3 border-primary">
                                <span class=" text-right text-primary">Have any questions?</span>
                                <a href="(919) 579-1490"><span class="text-right text-secondary">Call: (919) 579-1490</span></a>
                            </div>
                        </div>
                        </div>
                </nav>
            </div>
        </div>
        


       


       


       


        <!-- Programs Start -->
        <div class="container-fluid program  py-3">
            <div class="container py-5">
                
                <div class="row g-2 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="program-item rounded">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ asset('welcome/img/program-1.jpg') }}" class="img-fluid w-100" alt="Image">
                                </div>
                                
                            </div>
                            <div class="program-text bg-white px-4 pb-3">
                                <div class="program-text-inner">
                                    <a href="https://ssscompany.netlify.app/" class="h4 center">SSN Construction</a>
                                   
                                </div> 
                            </div>
                            <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                
                            </div>
                            <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                               
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-lg-6 col-xl-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="program-item rounded">
                            <div class="program-img position-relative">
                                <div class="overflow-hidden img-border-radius">
                                    <img src="{{ asset('welcome/img/program-2.jpg') }}" class="img-fluid w-100" alt="Image">
                                </div>
                                
                            </div>
                            <div class="program-text bg-white px-4 pb-3">
                                <div class="program-text-inner">
                                    <a href="{{ route('engineer') }}" target="_blank" class="h4 center">SSN Engineering</a>
                                   
                                </div> 
                            </div>
                            <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                                
                            </div>
                            <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                               
                            </div>
                        </div>
                    </div>
                    
                </div> 
            </div>
        </div>
        <!-- Program End -->


        


        <!-- Blog Start-->
       
        <!-- Blog End-->


       

       
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>SSN Groups</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        {{-- Designed By <a class="border-bottom" href="mailto:ujwalkoirala@gmail.com">ujwalkoirala@gmail.com</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('welcome/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('welcome/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('welcome/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('welcome/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('welcome/lib/wow/wow.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('welcome/js/main.js') }}"></script>
    </body>

</html>