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
                                       <h4 class="card-title">Upload Signature</h4>
                                    </div>
                                 </div>

                                 <div class="iq-card-body">
                                    <form method="post" enctype="multipart/form-data" action="{{route('upload_signature')}}">
                                       @csrf
                                       
                                       <div class="row align-items-center">



                                          <div class="form-group row align-items-center">
                                             <div class="col-md-12">
                                             <!-- <label for="uname">Upload your Signature Here:</label> <br> -->
                                                <div class="profile-img-edit">
                                                   @if(Auth::user()->signature == NULL)
                                                   <img id="signaturePreview" src="{{asset('c_assets/images/user/signature.png')}}" style="height:150px" alt="profile-pic">
                                                   <div class="p-image">
                                                         <i class="ri-pencil-line upload-button"></i>
                                                         <input class="file-upload" type="file" accept="image/*" required name="signature" id="signature">
                                                   </div>
                                                   @else
                                                   <img  src="{{asset('public/profile_signatures')}}/{{Auth::user()->signature}}" style="height:150px;" alt="signature-pic">
                                                   @endif
                                                </div>
                                             </div>
                                          </div>

                                       <script>
                                          $(document).ready(()=>{
                                             
                                                $('#signature').change(function(){
                                                   const file = this.files[0];
                                                   console.log(file);
                                                   if (file){
                                                   let reader = new FileReader();
                                                   reader.onload = function(event){
                                                        
                                                      console.log(event.target.result);
                                                      $('#signaturePreview').attr('src', event.target.result);
                                                   }
                                                   reader.readAsDataURL(file);
                                                   }
                                                });
                                             });

                                       </script>
                                          
                                         

                                    
                                          
                                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                          
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
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