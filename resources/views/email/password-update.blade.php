<!DOCTYPE html>
<html>
<head>
    <title>Password updated</title>
</head>
<body>
<div style="text-align: center;  font-family: verdana; width: 100%;">
    <h1 style="color: dodgerblue;">Account Password Updated</h1>

    <p>Hi {{$mail_data['name']}},<br/>

        Your account's password has been reset successfully, you can now login with your new password.

    </p>

    <small style="color: dodgerblue;">
        Didn't request this change?
        If you didn't request a new password, <a target="_blank" href="mailto:{{$mail_data['site_email']}}" style="color:#475c77; text-decoration:underline;">let us know.</a>.
    </small>
</div>

</body>
</html>
