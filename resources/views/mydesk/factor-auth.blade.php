<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ID-CAPITALS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="main_assets/img/logo_main.jpg" rel="icon">
  <link href="main_assets/img/logo_main.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('main_assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('main_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('main_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('main_assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('main_assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('main_assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('main_assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('main_assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="home">
          <img src="main_assets/img/logo_main.jpg" alt="" style="height: 100px !important;">
        </a>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="main_assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="home#about">About</a></li>
          <li><a class="nav-link scrollto" href="home#packages">Packages</a></li>
          <li><a class="nav-link scrollto" href="home#contact">Contact</a></li>
          <li><a class="nav-link" href="signup">Join Us</a></li>
          <li><a class="getstarted scrollto" href="login">Sign in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  


  <main id="main" class="mt-5">
    <section id="about" class="reg">
        <div class="container" data-aos="fade-up">
  
          
  
          <div class="row content justify-content-center">
            <div class="col-lg-5 pt-4 pt-lg-0 shadow-lg">
              <form class="m-md-4 mt-sm-4" action="{{route('otp_check')}}" method="post">
                  @csrf
                  <div class="section-title">
                    <h2>Verify me</h2>
                    <p>An OTP Code has been sent to your email. Check Your inbox or spam folder</p>
                  </div>

                  @if(session()->has('message')) 
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <Strong>{{ session()->get('message') }}</strong>
                    </div>                               
                  @endif
                  <div class="form-floating mb-3 border border-su">
                    <input type="text" name="otp" class="form-control" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput">Enter Your OTP code Here</label>
                  </div>
                             
                  


                  <div class="row mt-3">
                    

                    <div class="d-grid gap-2 d-md-block mt-2">
                      <button type="submit" class="btn btn-success btn-block btn-lg col-12" style="color:#fed700">SUBMIT</button>
                    </div>


                    

                  </div>

              </form>

            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  </main>


  <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-6 footer-contact">
        <!-- <h3>ID-CAPITALS</h3> -->
        <img src="main_assets/img/logo_main.jpg" alt="" class="img-fluid" style="height:150px">
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@idcapitals.com<br>
        </p>
      </div>

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="about-idcapitals">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="terms-and-conditions">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>


      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Join Our Newsletter</h4>
        <p>For Promos and updates on digital investment, subscribe to our Newsletter</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>
      </div>

    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>ID-CAPITALS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('main_assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('main_assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('main_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('main_assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('main_assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('main_assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('main_assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('main_assets/js/main.js')}}"></script>

</body>

</html>