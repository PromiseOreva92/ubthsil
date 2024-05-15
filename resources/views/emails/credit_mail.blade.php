<div style="text-center">
    <img src="{{url('images/logo_main.jpg')}}" alt="" class="img-fluid">
</div>
<h2 style="text-center">Credit Transaction!</h2>
<p style="margin-top:20px;font-size:16px">Dear {{$user->firstname}} {{$user->lastname}}</p>
<p style="margin-top:20px;font-size:16px">A credit transaction has occured on your account. The details are below:</p>
<p style="margin-top:10px;font-size:16px">
    <strong>Transaction:</strong>
    {{$transaction->type}}
</p>
<p style="margin-top:10px;font-size:16px">
    <strong>Amount:</strong>
    ${{$transaction->amount}}
</p>
<p style="margin-top:10px;font-size:16px">
    <strong>Balance:</strong>
    ${{$transaction->balance}}
</p>
<p style="margin-top:10px;font-size:16px">
    <strong>Description:</strong>
    {{$transaction->description}}
</p>
<p style="margin-top:10px;font-size:16px">
    <strong>Date/Time:</strong>
    {{date('jS F Y, H:i a',strtotime($transaction->created_at))}}
</p>
<p style="font-size:16px"> 
Feel free contact our customer support on support@idcapitals.com if your are having any challenge.
</p>
<p style="margin-top:20px;font-size:16px">
    Warm Regards,<br>
    <strong>Support Team</strong>
</p>