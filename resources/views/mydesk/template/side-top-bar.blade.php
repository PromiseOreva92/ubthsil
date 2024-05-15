   <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="home">
               <div class="iq-light-logo">
                  <img src="images/logo.gif" class="img-fluid" alt="">
               </div>
               <div class="iq-dark-logo">
                  <img src="images/logo-dark.gif" class="img-fluid" alt="">
               </div>
               <span style="text-transform:uppercase !important">UBTHSIL</span>
               </a>
               <div class="iq-menu-bt-sidebar">
                     <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                           <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                           <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                        </div>
                     </div>
                  </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                        <a href="home" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
                     </li>

                     @if (Auth::user()->user_type == "Admin")
                     <li>
                        <a href="newprofile" class="iq-waves-effect"><i class="ri-profile-line"></i><span>Create Staff Profile</span></a>
                     </li>
                     @endif

                     <li>
                        <a href="myprofile" class="iq-waves-effect"><i class="ri-profile-line"></i><span>My Profile</span></a>
                     </li>
                     <li>
                        <a href="selfservice" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Self Service</span></a>
                     </li>
                     <li>
                        <a href="create_document" class="iq-waves-effect"><i class="ri-book-3-line"></i><span>Create Document</span></a>
                     </li>
                     <li>
                        <a href="upload_doc" class="iq-waves-effect"><i class="ri-book-3-line"></i><span>Upload Documents</span></a>
                     </li>
                     @if (Auth::user()->mandate_permit == 1)
                     <li>
                        <a href="upload_man" class="iq-waves-effect"><i class="ri-book-3-line"></i><span>Upload Mandate</span></a>
                     </li>
                    @endif
                     <li>
                        <a href="signature_upload" class="iq-waves-effect"><i class="ri-book-3-line"></i><span>Upload Sugnature</span></a>
                     </li>
                     <li>
                        <a href="archived_documents" class="iq-waves-effect"><i class="ri-file-edit-line"></i><span>Archive</span></a>
                     </li>
                     
                     <li>
                        <a href="my_history" class="iq-waves-effect"><i class="ri-file-edit-line"></i><span>History</span></a>
                     </li>
                     <li>
                        <a href="logout" class="iq-waves-effect"><i class="ri-logout-box-line"></i><span>Logout</span></a>
                     </li>
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <div class="iq-light-logo">
                  <img src="images/logo.gif" class="img-fluid" alt="">
               </div>
               <div class="iq-dark-logo">
                  <img src="images/logo-dark.gif" class="img-fluid" alt="">
               </div>
                     <span>My Desk</span>
                     </a>
                  </div>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="navbar-left">
                 
                  <div class="iq-search-bar d-none d-md-block">
                        <h6 class="ms-4">Welcome Back {{Auth::user()->fullname}}</h6>
                  </div>
               </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        
                     
                     </ul>
                  </div>
                  <ul class="navbar-list">
                      <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">
                           @if(Auth::user()->photo != NULL)
                           <img src="{{asset('public/profile_images')}}/{{Auth::user()->photo}}" class="img-fluid rounded mr-3" alt="user">
                           @else
                           <img src="{{asset('c_assets/images/user/user.png')}}" class="img-fluid rounded mr-3" alt="user">
                           @endif
                           <div class="caption">
                              <h6 class="mb-0 line-height text-white">{{Auth::user()->fullname}}</h6>
                              <span class="font-size-12 text-white">Available</span>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello {{Auth::user()->firstname}} {{Auth::user()->lastname}}</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="myprofile" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="selfservice" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Account settings</h6>
                                          <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                       </div>
                                    </div>
                                 </a>

                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="btn btn-primary dark-btn-primary" href="logout" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
               

            </div>
         </div>