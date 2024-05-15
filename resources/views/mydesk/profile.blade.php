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
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-body profile-page p-0">
                           <div class="profile-header">
                              <div class="cover-container">
                                 <!-- <img src="{{asset('c_assets/images/page-img/profile-bg.jpg')}}" alt="profile-bg" class="rounded img-fluid"> -->
                                 <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                    <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                                 </ul>
                              </div>
                              <div class="profile-info p-4">
                                 <div class="row mt-5">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="user-detail pl-5">
                                          <div class="d-flex flex-wrap align-items-center">
                                             <div class="profile-img pr-4">
                                                @if(Auth::user()->photo != NULL)
                                                <img src="{{asset('public/profile_images')}}/{{Auth::user()->photo}}" class="img-fluid rounded mr-3" style="height:150px;" alt="user">
                                                @else
                                                <img src="{{asset('c_assets/images/user/user.png')}}" class="img-fluid rounded mr-3" alt="user">
                                                @endif                                             
                                             </div>
                                             <div class="profile-detail d-flex align-items-center">
                                                <h3>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h3>
                                             </div>
                                             
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">

                        <div class="col-lg-10 profile-center">
                           <div class="tab-content">
                              
                              <div class="tab-pane fade active show" id="profile-profile" role="tabpanel">

                                 <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                       <div class="iq-header-title">
                                          <h4 class="card-title">About User</h4>
                                       </div>
                                    </div>
                                    <div class="iq-card-body">
                                      
                                      <div class="mt-2">
                                       <h6>Joined:</h6>
                                       <p>{{date('jS F ,Y', strtotime(Auth::user()->created_at))}}</p>
                                      </div>
                                    
                                      <div class="mt-2">
                                       <h6>Email:</h6>
                                       <p><a href=""> {{Auth::user()->email}}</a></p>
                                      </div>
                                      
                                      @if(Auth::user()->user_type != NULL)
                                      <div class="mt-2">
                                       <h6>User Type:</h6>
                                       <p><a href="#">{{Auth::user()->user_type}}</a></p>
                                      </div>
                                      @endif

                                      @if(Auth::user()->state != NULL)
                                      <div class="mt-2">
                                       <h6>State:</h6>
                                       <p><a href="#">{{Auth::user()->state}}</a></p>
                                      </div>
                                      @endif

                                      @if(Auth::user()->country != NULL)
                                      <div class="mt-2">
                                       <h6>Country:</h6>
                                       <p><a href="#">{{Auth::user()->country}}</a></p>
                                      </div>
                                      @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
@include('mydesk.template.footer')