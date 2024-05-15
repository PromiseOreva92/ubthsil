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
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Archived Documents</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p>List of All Documents in Archive</p>
                           <div class="table-responsive">
                                 <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Document Title</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($documents as $document)
                                            <tr>
                                                <td>{{$document->title}}</td>
                                                <td>                        
                                                   <a href="print_document/{{$document->id}}" class="btn btn-link mr-3" rel="noopener" target="_blank" >
                                                        <i class="ri-printer-line"></i> 
                                                        Download Print
                                                    </a>
                                                    <a href="unarchive/{{$document->id}}" class="btn btn-sm btn-danger">
                                                        UnArchive
                                                    </a> 
                                                </td>
                                                
                                             </tr>
                                       @endforeach

                                    </tbody>
                                 </table>
                                 {{ $documents->links('pagination::bootstrap-4') }}
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