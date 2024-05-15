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
                              <h4 class="card-title">Add Wallet</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p></p>
                           @if(session()->has('message')) 
                           <div class="alert text-white bg-primary" role="alert">
                              <div class="iq-alert-text">{{ session()->get('message') }}</div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="ri-close-line"></i>
                              </button>
                           </div>                               
                           @endif
                           <form method="post" action="{{route('create_wallet')}}">
                              @csrf
                              <div class="form-group">
                                 <label for="exampleFormControlSelect1">Select Wallet</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="type" required>
                                    <option selected disabled value="">Choose a Wallet</option>
                                    <option>Bitcoin</option>
                                    <option>Ethereum</option>
                                    <option>Cadano</option>
                                    <option>USDT</option>
                                 </select>
                              </div>
                              
                              <button type="submit" class="btn btn-primary">Add Wallet</button>
                           </form>
                        </div>
                     </div>

                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Wallet List</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                              <div class="table-responsive">
                                 <table class="table mb-0 table-borderless">
                                    <thead>
                                       <tr>
                                          <th scope="col">Type</th>
                                          <th scope="col">Balance</th>
                                          <th scope="col" class="text-center">Status</th>

                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($wallets as $wallet)
                                       <tr>
                                          <td>{{$wallet->type}}</td>
                                          <td>${{$wallet->balance}}</td>
                                          <td class="text-center"><div class="badge badge-pill iq-bg-success">Active</div></td>
                                       </tr>
                                       @endforeach

                                    </tbody>
                                 </table>
                              </div>
                        </div>
                     </div>
                     
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      @include('mydesk.template.footer')