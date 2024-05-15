@include('mydesk.template.header')
   <body>
      <!-- loader Start -->
      @include('mydesk.template.preview')
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include("mydesk.template.side-top-bar")
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-10">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Transfer</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p style="font-weight:bold">Please Enter the Correct Details.</p>
                           @if(session()->has('message')) 
                           <div class="alert text-white bg-primary" role="alert">
                              <div class="iq-alert-text">{{ session()->get('message') }}</div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="ri-close-line"></i>
                              </button>
                           </div>                               
                           @endif
                           <form method="post" action="{{route('send_money')}}">
                              @csrf
                              <div class="form-group">
                                 <label for="exampleFormControlSelect1">From which Wallet</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="swallet" required>
                                    <option selected="" disabled="">Choose Wallet</option>
                                    @foreach($wallets as $wallet)
                                       <option value="{{$wallet->id}}">{{$wallet->type}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="email"> To Wallet Address:</label>
                                 <input type="text" class="form-control" id="address" name="rwallet_address" required>
                              </div>

                             
                              <div class="form-group">
                                 <label for="amount">Amount:</label>
                                 <input type="text" class="form-control" id="amount" name="amount" required>
                              </div>

                              <div class="form-group">
                                 <label for="amount">Description:</label>
                                 <input type="text" class="form-control" id="description" name="description">
                              </div>
                              
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </form>
                        </div>
                     </div>
                     
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      @include('mydesk.template.footer')