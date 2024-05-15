@include('mydesk.template.header')
   <body>
      <!-- loader Start -->
      @include('mydesk.template.preview')
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
      <!-- Sidebar  -->
      @include("mydesk.template.side-top-bar")
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                @if(session()->has('message')) 
                <div class="row">
                        <div class="col-12">
                            <div class="iq-card">
                                <div class="iq-card-body border text-center rounded">
                                    <div class="alert text-white bg-primary" role="alert">
                                        <div class="iq-alert-text">{{ session()->get('message') }}</div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ri-close-line"></i>
                                        </button>
                                    </div>                               
                                </div>
                            </div>                           
                        </div>
                </div>
                @endif                                    
                <div class="row justify-content-center">
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-body border text-center rounded">
                                <span class="font-size-18 text-uppercase">Bronze Pack</span>
                                <h2 class="mb-4 display-6 font-weight-bolder ">$50 - $499<small class="font-size-14 text-muted"></small></h2>
                                <ul class="list-unstyled line-height-4 mb-0">
                                    <li>5% Increase Yearly</li>
                                    <li>Customer Support</li>
                                    <li>Weekly Withdrawals</li>
                                </ul>
                                <button type="button" class="btn btn-primary btn-block mt-5" data-toggle="modal" data-target="#bronze">Get Pack</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="bronze" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bronze Pack</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('invest_money')}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">From which Wallet</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="wallet" required>
                                            <option selected disabled value="">Choose Wallet</option>
                                            @foreach($wallets as $wallet)
                                            <option value="{{$wallet->id}}">{{$wallet->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                        
                                    <div class="form-group">
                                        <label for="amount">Amount to Invest $:</label>
                                        <input type="text" class="form-control" id="amount" name="amount" required>
                                    </div>
                                    <input type="hidden" name="type" value="Bronze">
                                                                        
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Invest Fund</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="iq-card bg-primary text-white">
                            <div class="iq-card-body border text-center rounded">
                                <span class="font-size-18 text-uppercase">Silver Pack</span>
                                <h2 class="mb-4 display-6 font-weight-bolder ">$500 - $999<small class="font-size-14 text-muted"></small></h2>
                                <ul class="list-unstyled line-height-4 mb-0 ">
                                    <li>10% Increase Yearly</li>
                                    <li>Customer Support</li>
                                    <li>Weekly Withdrawals</li>
                                </ul>
                                <button type="button" class="btn btn-light btn-block mt-5" data-toggle="modal" data-target="#silver">Get Pack</button>

                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="silver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Silver Pack</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('invest_money')}}">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">From which Wallet</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="wallet" required>
                                            <option selected disabled value="">Choose Wallet</option>
                                            @foreach($wallets as $wallet)
                                            <option value="{{$wallet->id}}">{{$wallet->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="amount">Amount to Invest $:</label>
                                        <input type="text" class="form-control" id="amount" name="amount" required>
                                    </div>
                                    <input type="hidden" name="type" value="Silver">
                                
                                        
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Invest Fund</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-body border text-center rounded">
                                <span class="font-size-18 text-uppercase">Gold Pack</span>
                                <h3 class="mb-4 display-6 font-weight-bolder ">Above $1000<small class="font-size-14 text-muted"></small></h3>
                                <ul class="list-unstyled line-height-4 mb-0">
                                    <li>20% Increase Yearly</li>
                                    <li>Customer Support</li>
                                    <li>Weekly Withdrawals</li>
                                </ul>
                                <button type="button" class="btn btn-primary btn-block mt-5" data-toggle="modal" data-target="#gold">Get Pack</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="gold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Gold Pack</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('invest_money')}}">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">From which Wallet</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="wallet" required>
                                            <option selected disabled value="">Choose Wallet</option>
                                            @foreach($wallets as $wallet)
                                            <option value="{{$wallet->id}}">{{$wallet->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="amount">Amount to Invest $:</label>
                                        <input type="text" class="form-control" id="amount" name="amount" required>
                                    </div>
                                    <input type="hidden" name="type" value="Gold">
                                
                                        
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Invest Fund</button>
                                </div>
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