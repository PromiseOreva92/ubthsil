@include('header')


  <main id="main" class="mt-5">
    <section id="about" class="reg">
        <div class="container" data-aos="fade-up">
  
          
  
          <div class="row content justify-content-center">
            <div class="col-lg-5 pt-4 pt-lg-0 shadow-lg">
              <form class="m-md-4 mt-sm-4" action="recover-email" method="post">
                  @csrf
                  <div class="section-title">
                    <h2>Recover Password</h2>
                    <p>Give us your registered email </p>
                  </div>

                  @if(session()->has('message')) 
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <Strong>{{ session()->get('message') }}</strong>
                    </div>                               
                  @endif
                  <div class="form-floating mb-3 border border-su">
                    <input type="email" name="email" class="form-control border border-success" id="floatingInput" placeholder="name@example.com" required="">
                    <label for="floatingInput" class="text-success">Email address</label>
                  </div>   


                  <div class="row mt-3">
                    

                    <div class="d-grid gap-2 d-md-block mt-2">
                      <button type="submit" class="btn btn-success btn-block btn-lg col-12" style="color:#fed700">Submit</button>
                    </div>
                    

                  </div>

              </form>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  </main>




 @include('footer')