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
            <h2>Hello {{$reset_data['name']}}.</h2><br>
            <p>To reset your password, please click reset. </p>
            <br>
            <a href="http://192.168.244.146:8000/reset/password?code={{$reset_data['verification_code']}}">Reset Password</a>
            <br><br>
            Thank you!. for more info please visit <em>www.bolinaotourism.com</em>
        </div>
    </section>

</body>
</html>