<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/mailnotif.css')}}">
    <title>Tourism Email Verification</title>
</head>
<body>
    
    <section>
        <div class="mail-container">
            <h2>Hello {{$acc_data['name']}}, thank you for register.</h2><br>
            <p>This is your OTP: <span>{{ $acc_data['otp'] }}</span>, or you can click verify to activate your account. </p>
            <br>
            <a href="http://192.168.244.146:8000/verify?code={{$acc_data['verification_code']}}">Verify</a>
            <br><br>
            Thank you!. for more info please visit <em>www.bolinaotourism.com</em>
        </div>
    </section>

</body>
</html>