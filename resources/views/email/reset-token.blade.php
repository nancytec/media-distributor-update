<!DOCTYPE html>
<html>
<head>
    <title>Reset Code</title>
</head>
<body>
<div style="text-align: center;  font-family: verdana; width: 100%;">
    <h1 style="color: dodgerblue;">Password Reset Token</h1>

    <p>Hi {{$mail_data['name']}},<br/>

        We received a request to reset your {{$mail_data['app_name']}} password.
        Enter the following password reset code: <b>{{$mail_data['token']}}</b>

    </p>

    <small style="color: dodgerblue;">
        Didn't request this change?
        If you didn't request a new password, <a target="_blank" href="mailto:{{$mail_data['site_email']}}" style="color:#475c77; text-decoration:underline;">let us know.</a>.
    </small>
</div>






</body>
</html>
