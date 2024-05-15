@include('header')


  <main id="main" class="mt-5" style="background-color:#ccc !important">
    <section id="about" class="reg">
        <div class="container" data-aos="fade-up">
  
          
  
          <div class="row content justify-content-center">
            <div class="col-lg-5 pt-4 pt-lg-0 shadow-lg bg-white">
              <form class="m-md-4 mt-sm-4" action="{{route('auth_user')}}" method="post">
                  @csrf
                  <div class="section-title">
                    <h2>Sign in</h2>
                    <p>Login to Start a session</p>
                  </div>

                  @if(session()->has('message')) 
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <Strong>{{ session()->get('message') }}</strong>
                    </div>                               
                  @endif
                  <div class="form-floating mb-3 border border-su">
                    <input type="email" name="email" class="form-control border border-danger" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput" class="text-danger">Email address</label>
                  </div>
              
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control border border-danger" id="floatingPassword" placeholder="Password" required="">
                    <label for="floatingPassword" class="text-danger">Password</label>
                  </div>         

             



                  <div class="row mt-3">
                    

                    <div class="d-grid gap-2 d-md-block mt-2">
                      <button type="submit" class="btn btn-danger btn-block btn-lg col-12" style="color:#fff">LOGIN</button>
                    </div>

                    <!--<div class="col-6 mt-3">-->
                    <!--  <a href="forgot-password" class="text-danger" style="font-weight:bold">Forgot Password?</a>-->
                    <!--</div>-->

                    <!--<div class="col-6 mt-3">-->
                    <!--  <a href="signup" class="text-danger" style="font-weight:bold">Not a member? Signup</a>-->
                    <!--</div>-->

                    <!--<div class="d-grid gap-2 d-md-block mt-2">-->
                    <!--  <p style="font-size: 10px;">All Investments Involves Risk. Only risk capital you are prepared to loose. This site is protected by reCAPTCHA Google Privacy Policy and Terms of Policy Service</p>-->
                    <!--</div>-->
                    

                  </div>




              </form>


            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  </main>




 @include('footer')