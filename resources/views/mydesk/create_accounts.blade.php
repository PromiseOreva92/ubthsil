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
                     <div class="iq-edit-list-data">
                        @if(session()->has('message')) 
                           <div class="alert text-white bg-primary" role="alert">
                              <div class="iq-alert-text">{{ session()->get('message') }}</div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="ri-close-line"></i>
                              </button>
                           </div>                               
                        @endif                                    

                        <div>
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                               <div class="iq-card">

                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">New Staff Information</h4>
                                    </div>
                                 </div>

                                 <div class="iq-card-body">
                                    <form method="post" enctype="multipart/form-data" action="{{route('create_account')}}">
                                       @csrf
                                        <div class="row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Staff Fullname:</label>
                                             <input type="text" class="form-control" name="fullname" required>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Staff Email:</label>
                                             <input type="email" class="form-control" name="email" required>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Staff Phone Number:</label>
                                             <input type="text" class="form-control" name="phone" required>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Staff Designation:</label>
                                             <input type="text" class="form-control" name="designation" required>
                                          </div>

                                          <div class="form-group col-sm-6">
                                             <label for="fname">Account Type:</label>
                                             <select name="user_type" id="" class="form-control" required>
                                                <option value="" selected disabled>Select Account Type</option>
                                                <option>User</option>
                                                <option>Admin</option>
                                                <option>Secretary</option>
                                                <option>Registry</option>
                                             </select>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Create Account</button>
                                    </form>
                                 </div>
                              </div>
                           </div>



                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                     <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">All User</h4>
                              </div>
                              <div class="iq-card-header-toolbar d-flex align-items-center">
                                 <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">

                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              @if(count($users)==0)
                                    <h6 class="ms-4" style="font-weight:bold">No User Available</h6>
                              @else
                                 
                                    <div class="table-responsive">
                                       <table class="table mb-0 table-borderless">
                                          <thead>
                                             
                                             <tr>
                                                <th scope="col">Fullname</th>
                                                <!-- <th scope="col">Email</th> -->
                                                <th scope="col">Phone</th>
                                                <th scope="col">Designation</th>
                                                <!-- <th scope="col">Account Type</th> -->
                                                <th scope="col" class="text-center">Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          @foreach($users as $user)
                                                <tr>
                                                   <td>{{$user->fullname}}</td>
                                                   <!-- <td>{{$user->email}}</td> -->
                                                   <td>{{$user->phone}}</td>
                                                   <td>{{$user->designation}}</td>
                                                   <!-- <td>{{$user->user_type}}</td> -->
                                                   <td class="text-center">
                                                   <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-{{$user->id}}">
                                                         Edit
                                                   </button>
                                                      <div id="modal-{{$user->id}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
                                                         <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Edit User</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                                  </button>
                                                               </div>
                                                               <form action="{{route('edit_user')}}" method="post" enctype="multipart/form-data">
                                                                  @csrf
                                                                  <div class="modal-body">
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">Fullname:</label>
                                                                        <input type="text" class="form-control" name="fullname" value="{{$user->fullname}}">
                                                                     </div>
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">Email:</label>
                                                                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                                                     </div>
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">Phone:</label>
                                                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                                                     </div>
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">Designation:</label>
                                                                        <input type="text" class="form-control" name="designation" value="{{$user->designation}}">
                                                                     </div>
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="fname">Account Type:</label>
                                                                        <select name="user_type" id="" class="form-control" required>
                                                                           <option value="" selected disabled>Select Account Type</option>
                                                                           <option>User</option>
                                                                           <option>Admin</option>
                                                                           <option>Secretary</option>
                                                                           <option>Registry</option>
                                                                        </select>
                                                                     </div>

                                                                     <input type="hidden" name="user_id" value="{{$user->id}}">
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                     <button type="submit" class="btn btn-primary">Edit</button>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                         </div>
                                                      </div>                                                      
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalpsw-{{$user->id}}">
                                                       Password
                                                    </button>
                                                        <div id="modalpsw-{{$user->id}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
                                                         <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Change User Password</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                                  </button>
                                                               </div>
                                                               <form action="{{route('change_userpassword')}}" method="post" enctype="multipart/form-data">
                                                                  @csrf
                                                                  <div class="modal-body">
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">New Password:</label>
                                                                        <input type="text" class="form-control" name="npass">
                                                                     </div>
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">Confirm Password:</label>
                                                                        <input type="text" class="form-control" name="vpass">
                                                                     </div>
                                                                    
                                                                     <input type="hidden" name="user_id" value="{{$user->id}}">
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                     <button type="submit" class="btn btn-primary">Change Password</button>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                         </div>
                                                      </div>                                                      


                                                    <a class="btn btn-sm btn-danger" href="delete_user/{{$user->id}}">
                                                         Delete
                                                   </a>

                                                   </td>
                                                </tr>
                                          @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                 
                              @endif
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