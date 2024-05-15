@include('mydesk.template.header')
   <body class="sidebar-main-active right-column-fixed header-top-bgcolor">
      <!-- loader Start -->
      @include('mydesk.template.preview')
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper" style="width:100% !important">
         <!-- Sidebar  -->
         @include("mydesk.template.side-top-bar")

            <!-- TOP Nav Bar END -->
            <!-- Page Content  -->
            <div id="content-page" class="content-page">
               <div class="container-fluid">

                  <div class="row">
                     <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch ">
                           <div class="iq-card-body">
                                 <div class="d-flex d-flex align-items-center justify-content-between">
                                    <div>
                                          <h2>{{$users_no}}</h2>
                                          <p class="fontsize-sm m-0">Users</p>
                                    </div>
                                    <div class="rounded-circle iq-card-icon dark-icon-light iq-bg-primary "> <i class="ri-inbox-fill"></i></div>
                                 </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch ">
                           <div class="iq-card-body">
                              <div class="d-flex d-flex align-items-center justify-content-between">
                                 <div>
                                    <h2>{{$documents_no}}</h2>
                                    <p class="fontsize-sm m-0">Pending Docs</p>
                                 </div>
                                 <div class="rounded-circle iq-card-icon iq-bg-warning "><i class="ri-price-tag-3-line"></i></div>
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
                                 <h4 class="card-title">Documents</h4>
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
                              @if(count($all_documents)==0)
                                    <h6 class="ms-4" style="font-weight:bold">No Documents has been uploaded</h6>
                              @else
                                 
                                    <div class="table-responsive">
                                       <table class="table mb-0 table-borderless">
                                          <thead>
                                             
                                             <tr>
                                                <th scope="col">Title</th>
                                                <th scope="col">Status</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          @foreach($all_documents as $document)
                                                <tr>
                                                   <td>{{$document->title}}</td>
                                                   <td>Document is currently on the desk of {{$document->receiver->fullname}} - {{$document->receiver->designation}}</td>                                                   
                                                </tr>
                                          @endforeach
                                          </tbody>
                                       </table>
                                       {{ $all_documents->links('pagination::bootstrap-4') }}
                                    </div>
                                 
                              @endif
                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Pending Documents on Your Desk</h4>
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
                                    <h6 class="ms-4" style="font-weight:bold">You have No Documents</h6>
                              @else
                                 
                                    <div class="table-responsive">
                                       <table class="table mb-0 table-borderless">
                                          <thead>
                                             
                                             <tr>
                                                <th scope="col">Title</th>
                                                <th scope="col">From</th>
                                                <th scope="col">To</th>
                                                <th scope="col" class="text-center">Status</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          @foreach($documents as $document)
                                                <tr>
                                                   <td>{{$document->title}}</td>
                                                   <td>{{$document->sender->fullname}}</td>
                                                   <td>{{$document->receiver->fullname}}</td>
                                                   <td class="text-center">
                                                   <a href="document/{{$document->id}}" class="btn btn-sm btn-primary">
                                                         View
                                                   </a>
                                                   
                                                   <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#appendModal_{{$document->id}}">
                                                         Append Signature
                                                   </button>
                                                    @if(Auth::user()->signature==NULL || Auth::user()->signature=="")
                                                      <div id="appendModal_{{$document->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Notice!!</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body">
                                                                     <p>You have no signature on your profile. Please Upload one</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                               
                                                            </div>
                                                         </div>
                                                      </div>
                                                    @else  
                                                       <div id="appendModal_{{$document->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Minute on Document</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                                  </button>
                                                               </div>
                                                               <form action="{{route('input_comment')}}" method="post" enctype="multipart/form-data">
                                                                  @csrf
                                                                  <div class="modal-body">
                                                                     <div class="form-group col-sm-12">
                                                                        <label for="comment">Write Your Comment:</label>
                                                                        <input type="text" class="form-control" name="comment">
                                                                     </div>
                                                                     <input type="hidden" name="document_id" value="{{$document->id}}">
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                     <button type="submit" class="btn btn-primary">Embed Signature</button>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                         </div>
                                                        </div> 
                                                    @endif
                                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#forwardModal_{{$document->id}}">
                                                         Forward Doc
                                                      </button>
                                                         <div id="forwardModal_{{$document->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                               <div class="modal-content">
                                                                  <div class="modal-header">
                                                                     <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Forward Document To?</h5>
                                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">×</span>
                                                                     </button>
                                                                  </div>
                                                                  <form action="{{route('forward_doc')}}" method="post" enctype="multipart/form-data">
                                                                     @csrf
                                                                     <div class="modal-body">
                                                                        <div class="form-group col-sm-12">
                                                                           <label for="comment">Choose Staff:</label>
                                                                           <select name="receiver_id" class="form-control form-control mb-3" required>
                                                                              <option selected="" disabled>Select Staff</option>
                                                                              @foreach ($users as $user)
                                                                                 <option value="{{$user->id}}">{{$user->fullname}} - {{$user->designation}}</option>
                                                                              @endforeach
                                                                              
                                                                              
                                                                           </select>
                                                                        </div>
                                                                        <input type="hidden" name="document_id" value="{{$document->id}}">
                                                                     </div>
                                                                     <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Forward this Document</button>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                            </div>
                                                         </div>

                                                         @if (Auth::user()->user_type == "Registry")
                                                            @if ($document->status == 0)
                                                               <a href="archive/{{$document->id}}" class="btn btn-sm btn-success">
                                                                  Archive Document
                                                               </a> 
                                                            @endif
                                                               
                                                         @endif
                                                         
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
                  
                  @if(Auth::user()->mandate_permit == 1)
                  
                      <div class="row">
                         <div class="col-lg-12">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                               <div class="iq-card-header d-flex justify-content-between">
                                  <div class="iq-header-title">
                                     <h4 class="card-title">Mandate Documents</h4>
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
                                  @if(count($mandate_documents)==0)
                                        <h6 class="ms-4" style="font-weight:bold">No Mandate Documents has been uploaded</h6>
                                  @else
                                     
                                        <div class="table-responsive">
                                           <table class="table mb-0 table-borderless">
                                              <thead>
                                                 
                                                 <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Status</th>
                                                 </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($mandate_documents as $document)
                                                    <tr>
                                                       <td>{{$document->title}}</td>
                                                       <td>Document is currently on the desk of {{$document->receiver->fullname}} - {{$document->receiver->designation}}</td>                                                   
                                                    </tr>
                                              @endforeach
                                              </tbody>
                                           </table>
                                           {{ $mandate_documents->links('pagination::bootstrap-4') }}
                                        </div>
                                     
                                  @endif
                               </div>
                            </div>
                         </div>
    
                      </div>
                      <div class="row">
                         <div class="col-lg-12">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                               <div class="iq-card-header d-flex justify-content-between">
                                  <div class="iq-header-title">
                                     <h4 class="card-title">Pending Mandate Documents on Your Desk</h4>
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
                                  @if(count($m_documents)==0)
                                        <h6 class="ms-4" style="font-weight:bold">You have No Mandate Documents</h6>
                                  @else
                                     
                                        <div class="table-responsive">
                                           <table class="table mb-0 table-borderless">
                                              <thead>
                                                 
                                                 <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">From</th>
                                                    <th scope="col">To</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                 </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($m_documents as $document)
                                                    <tr>
                                                       <td>{{$document->title}}</td>
                                                       <td>{{$document->sender->fullname}}</td>
                                                       <td>{{$document->receiver->fullname}}</td>
                                                       <td class="text-center">
                                                       <a href="document/{{$document->id}}" class="btn btn-sm btn-primary">
                                                             View
                                                       </a>
                                                       
                                                       <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#appendModal_{{$document->id}}">
                                                             Append Signature
                                                       </button>
                                                        @if(Auth::user()->signature==NULL || Auth::user()->signature=="")
                                                          <div id="appendModal_{{$document->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                   <div class="modal-header">
                                                                      <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Notice!!</h5>
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">×</span>
                                                                      </button>
                                                                   </div>
                                                                   <div class="modal-body">
                                                                         <p>You have no signature on your profile. Please Upload one</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                   
                                                                </div>
                                                             </div>
                                                          </div>
                                                        @else  
                                                           <div id="appendModal_{{$document->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                             <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                   <div class="modal-header">
                                                                      <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Minute on Document</h5>
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">×</span>
                                                                      </button>
                                                                   </div>
                                                                   <form action="{{route('input_comment')}}" method="post" enctype="multipart/form-data">
                                                                      @csrf
                                                                      <div class="modal-body">
                                                                         <div class="form-group col-sm-12">
                                                                            <label for="comment">Write Your Comment:</label>
                                                                            <input type="text" class="form-control" name="comment">
                                                                         </div>
                                                                         <input type="hidden" name="document_id" value="{{$document->id}}">
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                         <button type="submit" class="btn btn-primary">Embed Signature</button>
                                                                      </div>
                                                                   </form>
                                                                </div>
                                                             </div>
                                                            </div> 
                                                        @endif
                                                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#forwardModal_{{$document->id}}">
                                                             Forward Doc
                                                          </button>
                                                             <div id="forwardModal_{{$document->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                                   <div class="modal-content">
                                                                      <div class="modal-header">
                                                                         <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Forward Document To?</h5>
                                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                         <span aria-hidden="true">×</span>
                                                                         </button>
                                                                      </div>
                                                                      <form action="{{route('forward_doc')}}" method="post" enctype="multipart/form-data">
                                                                         @csrf
                                                                         <div class="modal-body">
                                                                            <div class="form-group col-sm-12">
                                                                               <label for="comment">Choose Staff:</label>
                                                                               <select name="receiver_id" class="form-control form-control mb-3" required>
                                                                                  <option selected="" disabled>Select Staff</option>
                                                                                  @foreach ($users as $user)
                                                                                        @if($user->mandate_permit == 1)
                                                                                         <option value="{{$user->id}}">{{$user->fullname}} - {{$user->designation}}</option>
                                                                                        @endif
                                                                                  @endforeach
                                                                                  
                                                                                  
                                                                               </select>
                                                                            </div>
                                                                            <input type="hidden" name="document_id" value="{{$document->id}}">
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Forward this Document</button>
                                                                         </div>
                                                                      </form>
                                                                   </div>
                                                                </div>
                                                             </div>
    
                                                             @if (Auth::user()->user_type == "Registry")
                                                                @if ($document->status == 0)
                                                                   <a href="archive/{{$document->id}}" class="btn btn-sm btn-success">
                                                                      Archive Document
                                                                   </a> 
                                                                @endif
                                                                   
                                                             @endif
                                                             
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
                      
                  @endif
                  
               </div>
               
            </div>
              
            
      </div>
 


      <div class="iq-right-fixed">
            <div class="iq-card mb-0" style="box-shadow: none;">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Project Statistic</h4>
                  </div>
                  <!--<div class="iq-card-header-toolbar d-flex align-items-center">-->
                  <!--   <div class="dropdown">-->
                  <!--     <span class="dropdown-toggle" id="dropdownMenuButton-five" data-toggle="dropdown">-->
                  <!--      <a href="#">See All</a>-->
                  <!--      </span>-->
                  <!--      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-five">-->
                  <!--         <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>-->
                  <!--         <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>-->
                  <!--         <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>-->
                  <!--         <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>-->
                  <!--         <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>-->
                  <!--      </div>-->
                  <!--   </div>-->
                  <!--</div>-->
               </div>
               <div class="iq-card-body">
                  <div id="chartdiv"></div>
               </div>
            </div>
            <!--<div class="iq-card mb-0" style="box-shadow: none;">-->
            <!--   <div class="iq-card-header d-flex justify-content-between">-->
            <!--      <div class="iq-header-title">-->
            <!--         <h4 class="card-title">Project Statistic</h4>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--    <div class="iq-card-body">-->
            <!--      <ul class="suggestions-lists m-0 p-0">-->
            <!--         <li class="d-flex mb-4 align-items-center">-->
            <!--            <div class="profile-icon iq-bg-danger"><span>G</span></div>-->
            <!--            <div class="media-support-info ml-3">-->
            <!--               <h6>Adding Item</h6>-->
            <!--               <p class="mb-0 fontsize-sm">Development</p>-->
            <!--            </div>-->
            <!--            <div class="iq-card-header-toolbar d-flex align-items-center">-->
            <!--               <div class="dropdown">-->
            <!--                  <span class="dropdown-toggle text-primary" id="dropdownMenuButton41" data-toggle="dropdown">-->
            <!--                  <i class="ri-more-line"></i>-->
            <!--                  </span>-->
            <!--                  <div class="dropdown-menu dropdown-menu-right p-0">-->
            <!--                     <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>-->
            <!--                     <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>-->
            <!--                     <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>-->
            <!--                  </div>-->
            <!--               </div>-->
            <!--            </div>-->
            <!--         </li>-->
            <!--         <li class="d-flex align-items-center">-->
            <!--            <div class="profile-icon iq-bg-warning"><span>B</span></div>-->
            <!--            <div class="media-support-info ml-3">-->
            <!--               <h6>Admin Panel</h6>-->
            <!--               <p class="mb-0 fontsize-sm">Development</p>-->
            <!--            </div>-->
            <!--            <div class="iq-card-header-toolbar d-flex align-items-center">-->
            <!--               <div class="dropdown">-->
            <!--                  <span class="dropdown-toggle text-primary" id="dropdownMenuButton42" data-toggle="dropdown">-->
            <!--                  <i class="ri-more-line"></i>-->
            <!--                  </span>-->
            <!--                  <div class="dropdown-menu dropdown-menu-right p-0">-->
            <!--                     <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>-->
            <!--                     <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>-->
            <!--                     <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>-->
            <!--                  </div>-->
            <!--               </div>-->
            <!--            </div>-->
            <!--         </li>-->
            <!--      </ul>-->
            <!--   </div>-->
            <!--</div>-->
            <!--<div class="iq-card" style="box-shadow: none;">-->
            <!--   <div class="iq-card-header d-flex justify-content-between">-->
            <!--      <div class="iq-header-title">-->
            <!--         <h4 class="card-title">Countries</h4>-->
            <!--      </div>-->
            <!--      <div class="iq-card-header-toolbar d-flex align-items-center">-->
            <!--         <div class="dropdown">-->
            <!--            <span class="dropdown-toggle text-primary" id="dropdownMenuButton6" data-toggle="dropdown">-->
            <!--            <i class="ri-more-2-fill"></i>-->
            <!--            </span>-->
            <!--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">-->
            <!--               <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>-->
            <!--               <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>-->
            <!--               <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>-->
            <!--               <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>-->
            <!--               <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>-->
            <!--            </div>-->
            <!--         </div>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--   <div class="iq-card-body">-->
            <!--      <div class="row">-->
            <!--         <div class="col-lg-12">-->
                        <!--<div class="iq-details">-->
                        <!--   <div class="d-flex align-items-center justify-content-between">-->
                        <!--      <h6 class="title text-dark">Nigeria</h6>-->
                        <!--      <div class="percentage float-right text-primary">95 <span>%</span></div>-->
                        <!--   </div>-->
                        <!--   <div class="iq-progress-bar-linear d-inline-block w-100">-->
                        <!--      <div class="iq-progress-bar">-->
                        <!--         <span class="bg-primary" data-percent="95"></span>-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--<div class="iq-details mt-3">-->
                        <!--   <div class="d-flex align-items-center justify-content-between">-->
                        <!--      <h6 class="title text-dark">India</h6>-->
                        <!--      <div class="percentage float-right text-warning">75 <span>%</span></div>-->
                        <!--   </div>-->
                        <!--   <div class="iq-progress-bar-linear d-inline-block w-100">-->
                        <!--      <div class="iq-progress-bar">-->
                        <!--         <span class="bg-warning" data-percent="75"></span>-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</div>-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      @include('mydesk.template.footer')