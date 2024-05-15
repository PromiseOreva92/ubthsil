<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body style="font-family:sans-serif">


<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <img src="{{asset('public/document')}}/{{$document->doc_image}}" alt="" class="" style="width: 100%;">
        </div>
        @foreach ($transactions as $transaction)
            <div class="col-6" style="text-align:center">
                <h6 style="text-align:center;font-weight:bold">{{$transaction->comment}}</h6>
                <img src="{{asset('public/profile_signatures')}}/{{$transaction->user->signature}}" alt="signature" class="img-fluid" style="height:30px">
                <h6 style="text-align:center;font-weight:bold">{{$transaction->user->fullname}}</h6>
                <h6 style="text-align:center;font-weight:bold">{{$transaction->user->designation}}</h6>
            </div>
        @endforeach
        
    </div>
</div>
    
</body>
</html>
<script>
  window.addEventListener("load", window.print());
</script>