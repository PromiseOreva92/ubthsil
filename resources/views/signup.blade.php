
@include('header')


  <main id="main">
    <section id="about" class="reg">
        <div class="container" data-aos="fade-up">
  
          
  
          <div class="row content justify-content-center mt-5 pt-3">
            <div class="col-lg-5 pt-4 pt-lg-0 shadow-lg">
              <form class="m-md-4 mt-sm-4" action="add_user" method="post">
                  @csrf
                  <div class="section-title">
                    <h2>Join Us</h2>
                    <p>Take Your First step. Create an Account with us. All Fields are Required</p>
                  </div>
                  @if(session()->has('message')) 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <Strong>{{ session()->get('message') }}</strong>
                    </div>                               
                  @endif

                  <div class="form-floating mb-3">
                    <input type="text" name="fullname" class="form-control border border-success" id="floatingInput" placeholder="Username" required="">
                    <label for="floatingInput" class="text-success text-bold">Fullname</label>
                  </div>


                  <div class="form-floating mb-3 border border-su">
                    <input type="email" name="email" class="form-control border border-success" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput" class="text-success text-bold">Email</label>
                  </div>
              
                  

                  <div class="form-floating mb-3">
                    <input type="text" name="phone" class="form-control border border-success" id="floatingInput" placeholder="Username" required="">
                    <label for="floatingInput" class="text-success text-bold">Phone</label>
                  </div>
              
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control border border-success" id="floatingPassword" placeholder="Password" required="">
                    <label for="floatingPassword" class="text-success text-bold">Password</label>
                  </div>


                  <div class="row mt-3">
                      <div class="col-1">
                        <input class="form-check-input" type="checkbox" required>
                      </div>
                      <div class="col-11">
                        <label class="check-label" style="font-size:12px">
                          I accept Service  <a href="terms-and-conditions" class="text-success" style="font-weight:bold">Terms and Conditions</a>, Product Disclosure, Statement and Financial Services Guide (ASIC Regulated)
                          </label>
                      </div>
                  </div>


                  <div class="row mt-3">
                    <div class="col-1">
                      <input class="form-check-input" type="checkbox" required>
                    </div>

                    

                    <div class="d-grid gap-2 d-md-block mt-2">
                      <button type="submit" class="btn btn-success btn-block btn-lg col-12" style="color:#fed700 !important">CREATE ACCOUNT</button>
                    </div>

                    <div class="col-12 mt-3">
                      <a href="login" class="text-success" style="font-weight:bold">Already a member? Sign in</a>
                    </div>

                  
                    
                    

                  </div>

              </form>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  </main>




 @include('footer')