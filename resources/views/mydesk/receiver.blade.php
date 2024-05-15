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
                  <div class="col-sm-12 col-lg-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Receiver</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           @if(session()->has('message')) 
                              <p>Scan the QR Code to receive funds</p>
                              <div class="text-center">
                                 {!! QrCode::size(300)->generate(session()->get('message')); !!}
                                 <p>{{session()->get('message')}}</p>
                              </div>
                              <!-- <div class="alert text-white bg-primary" role="alert">
                                 <div class="iq-alert-text">{{ session()->get('message') }}</div>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <i class="ri-close-line"></i>
                                 </button>
                              </div>                                -->
                           @endif                           
                           <form method="post" action="{{route('receive_money')}}">
                              @csrf
                              <div class="form-group">
                                 <label for="exampleFormControlSelect1">To which Wallet</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="rwallet" required>
                                    <option selected="" disabled="">Choose Wallet</option>
                                    @foreach($wallets as $wallet)
                                       <option value="{{$wallet->id}}">{{$wallet->type}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="amount">Amount to be Received:</label>
                                 <input type="text" class="form-control" id="amount" name="amount" required>
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