<div style="text-center">
    <img src="{{url('images/logo_main.jpg')}}" alt="" class="img-fluid">
</div>
<h2 style="text-center">Welcome Aboard!</h2>
<p style="margin-top:20px;font-size:16px">Dear {{$firstname}} {{$lastname}}</p>
<p style="margin-top:20px;font-size:16px">You have Successfully created your account</p>
<p style="font-size:16px"> 

Please click on the link below to verify your email<br>
<a href="https://www.idcapitals.com/verify-me/{{$user->id}}/{{$code}}">https://www.idcapitals.com/verify-me/{{$user->id}}/{{$code}}</a> <br>
Feel free contact our customer support on support@idcapitals.com if your are having challenges.
</p>
<p style="margin-top:20px;font-size:16px">
    Warm Regards,<br>
    <strong>Support Team</strong>
</p>