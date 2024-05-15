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
                                       <h4 class="card-title">Document Information</h4>
                                    </div>
                                 </div>

                                 <div class="iq-card-body">
                                    <form method="post" enctype="multipart/form-data" action="{{route('upload_document')}}">
                                       @csrf
                                       <div class="form-group row align-items-center">
                                          <div class="col-md-12">
                                             <div class="profile-img-edit">
                                                <img id="docPreview" src="{{asset('c_assets/images/user/document.jpg')}}" style="height:150px;" alt="document-pic">
                                                <div class="p-image">
                                                  <i class="ri-pencil-line upload-button"></i>
                                                  <input class="file-upload" type="file" accept="image/*" required name="document" id="document">
                                                  
                                                </div>
                                    
                                             </div>
                                          </div>
                                       </div>

                                       <script>
                                          $(document).ready(()=>{
                                                $('#document').change(function(){
                                                   const file = this.files[0];
                                                   console.log(file);
                                                   if (file){
                                                   let reader = new FileReader();
                                                   reader.onload = function(event){
                                                      console.log(event.target.result);
                                                      $('#docPreview').attr('src', event.target.result);
                                                   }
                                                   reader.readAsDataURL(file);
                                                   }
                                                });
                                             });

                                       </script>
                                       <div class="row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Document Title/Caption:</label>
                                             <input type="text" class="form-control" name="title" required>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Comments/Extra Info:</label>
                                             <input type="text" class="form-control" name="comment" required>
                                          </div>
                                          
                                         

                                    
                                          
                                         
                                          
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Upload Doc</button>
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
                                 <h4 class="card-title">All Documents</h4>
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
                              @if(count($documents)==0)
                                    <h6 class="ms-4" style="font-weight:bold">No Available Document</h6>
                              @else
                                 
                                    <div class="table-responsive">
                                       <table class="table mb-0 table-borderless">
                                          <thead>
                                             
                                             <tr>
                                                <th scope="col">S/N</th> 
                                                <th scope="col">Title</th>
                                
                                                <th scope="col" class="text-center">Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            @php
                                                $count = 1;
                                            @endphp
                                          @foreach($documents as $document)
                                                <tr>
                                                    <td>{{$count}}</td>
                                                   <td>{{$document->title}}</td>
                                                   @if(Auth::user()->user_type == "Secretary")
                                                   <td class="text-center">
                                                           <a href="delete_doc/{{$document->id}}" class="btn btn-sm btn-danger">
                                                                 Delete Document
                                                           </a>
                                                   
                                                   </td>
                                                   @endif
                                                   <td class="text-center">
                                                           <a href="archive/{{$document->id}}" class="btn btn-sm btn-danger">
                                                                 Archive Document
                                                           </a>
                                                   
                                                   </td>
                                                   
                                                </tr>
                                            @php
                                                $count++;
                                            @endphp
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