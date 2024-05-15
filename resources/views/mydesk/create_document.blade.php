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
                        <div class="iq-card-body">
                            <div id="note" contenteditable="true" style="overflow-y:auto;min-height:500px;padding:20px;border:1px solid #ccc" class="mb-2"></div>
                            <button id="print_button" class="ms-2 btn btn-success" onclick="print_doc()">Print</button>

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

      <script>
         document.getElementById('insert_image').addEventListener('click', function(){
            
            var input = document.getElementById('image_input');
            if (input.files && input.files[0]) {

               var reader = new FileReader();
               alert(input)
               reader.onload = function(e){
                  var img = document.createElement('img');
                  img.src = e.target.result;

                  var selection = window.getSelection();
                  if (selection.rangeCount > 0) {
                     var range = selection.getRangeAt(0);
                     range.deleteContent();
                     range.insertNode(img);
                  }
               };
               reader.readerAsDataURL(input.files[0]);
            }
         })

         function print_doc(){
            let printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print Table</title>');
            printWindow.document.write("</head><body>")
            printWindow.document.write(document.getElementById('note').innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();


         }
      </script>