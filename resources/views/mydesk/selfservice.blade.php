@include('mydesk.template.header')
   <body>
      <!-- loader Start -->
      @include('mydesk.template.preview')
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('mydesk.template.side-top-bar')
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-body p-0">
                           <div class="iq-edit-list">
                              <ul class="iq-edit-profile d-flex nav nav-pills">

                                 <li class="col-md-6 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                       Update Profile Details
                                    </a>
                                 </li>
                                 
                                 <li class="col-md-6 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                       Change Password
                                    </a>
                                 </li>

                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="col-lg-12">
                     <div class="iq-edit-list-data">
                        @if(session()->has('message')) 
                           <div class="alert text-white bg-primary" role="alert">
                              <div class="iq-alert-text">{{ session()->get('message') }}</div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="ri-close-line"></i>
                              </button>
                           </div>                               
                        @endif                                    

                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                               <div class="iq-card">

                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Personal Information</h4>
                                    </div>
                                 </div>

                                 <div class="iq-card-body">
                                    <form method="post" enctype="multipart/form-data" action="{{route('update_profile')}}">
                                       @csrf
                                       <div class="form-group row align-items-center">
                                          <div class="col-md-12">
                                             <div class="profile-img-edit">
                                                @if(Auth::user()->photo == NULL)
                                                <img id="imgPreview" src="{{asset('c_assets/images/user/user.png')}}" style="height:150px;width:150px" alt="profile-pic">
                                                <div class="p-image">
                                                  <i class="ri-pencil-line upload-button"></i>
                                                  <input class="file-upload" type="file" accept="image/*" required name="photo" id="photo">
                                                  
                                                </div>
                                                @else
                                                
                                                <img id="imgPreview" src="{{asset('public/profile_images')}}/{{Auth::user()->photo}}" style="height:150px;" alt="profile-pic">
                                                <div class="p-image">
                                                  <i class="ri-pencil-line upload-button"></i>
                                                  <input class="file-upload" type="file" accept="image/*" required name="photo" id="photo">
                                                  
                                                </div>
                                                @endif
                                             </div>
                                          </div>
                                       </div>

                                       <script>
                                          $(document).ready(()=>{
                                                $('#photo').change(function(){
                                                   const file = this.files[0];
                                                   console.log(file);
                                                   if (file){
                                                   let reader = new FileReader();
                                                   reader.onload = function(event){
                                                      console.log(event.target.result);
                                                      $('#imgPreview').attr('src', event.target.result);
                                                   }
                                                   reader.readAsDataURL(file);
                                                   }
                                                });
                                             });

                                       </script>
                                       <div class="row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Full Name:</label>
                                             <input type="text" class="form-control" name="firstname" value="{{$user->fullname}}" disabled>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Phone:</label>
                                             <input type="text" class="form-control" name="lastname" value="{{$user->phone}}" disabled>
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label for="uname">Email:</label>
                                             <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                                          </div>

                                          <div class="form-group col-sm-12">
                                             <label for="uname">Designation:</label>
                                             <input type="email" class="form-control" name="email" value="{{$user->designation}}" disabled>
                                          </div>


                                      
                                          
                                         

                                    
                                          
                                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                          
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
                                    </form>
                                 </div>
                              </div>
                           </div>

                           


                           <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                               <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Change Password</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form method="post" action="{{route('change_password')}}">
                                      @csrf 
                                       <div class="form-group">
                                          <label for="cpass">Current Password:</label>
                                          <input type="Password" class="form-control" id="cpass" name="cpass" required>
                                       </div>
                                       <div class="form-group">
                                          <label for="npass">New Password:</label>
                                          <input type="Password" class="form-control" id="npass" name="npass" required>
                                       </div>
                                       <div class="form-group">
                                          <label for="vpass">Verify Password:</label>
                                             <input type="Password" class="form-control" id="vpass" name="vpass" required>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
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