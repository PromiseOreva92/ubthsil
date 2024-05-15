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
                              <h4 class="card-title">History</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p>List of All Documents You Signed</p>
                           <div class="table-responsive">
                                 <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Document Title</th>
                                            <th scope="col">Your Comment on the Document</th>
                                            <th scope="col" class="text-center">Date</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($transactions as $transaction)
                                            <tr>
                                                <td>{{$transaction->document->title}}</td>
                                                <td>{{$transaction->comment}}</td>
                                                <td>{{date('jS F Y',strtotime($transaction->created_at))}}</td>
                                                <td>                        
                                                   <a href="print_document/{{$transaction->document->id}}" class="btn btn-link mr-3" rel="noopener" target="_blank" ><i class="ri-printer-line"></i> Download Print</button>
                                                </td>
                                                
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
    <!-- Footer -->
    @include('mydesk.template.footer')