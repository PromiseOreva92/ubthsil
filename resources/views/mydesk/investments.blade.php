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
                              <h4 class="card-title">My Investment</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p></p>
                           <div class="table-responsive">
                                 <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Type</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($investments as $investment)
                                            <tr>
                                                <td>{{$investment->type}}</td>
                                                <td>${{$investment->amount}}</td>
                                                <td>{{date('jS F Y',strtotime($investment->created_at))}}</td>
                  
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