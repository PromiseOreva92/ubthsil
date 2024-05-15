<div style="text-center">
    <img src="{{url('images/logo_main.jpg')}}" alt="" class="img-fluid">
</div>
<h2 style="text-center">Reset Password!</h2>
<p style="margin-top:20px;font-size:16px">Dear {{$user->firstname}} {{$user->lastname}}</p>
<p style="margin-top:20px;font-size:16px">Please Enter the OTP code below to verify yourself</p>

Please click on the link below to verify your email<br>
<a href="https://www.idcapitals.com/reset/{{$user->id}}/{{$user->otp}}">https://www.idcapitals.com/reset/{{$user->id}}/{{$user->otp}}</a> <br>
<p style="font-size:16px"> 
Feel free contact our customer support on support@idcapitals.com if your are having any challenge.
</p>
<p style="margin-top:20px;font-size:16px">
    Warm Regards,<br>
    <strong>Support Team</strong>
</p>