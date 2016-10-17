<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tele Medicin</title>
    <style>
        .mail_confirm_body{
            border: 1px solid#0d6aad;
            width:60%;
            text-align: center;
        }
        .mail_confirm_body h1{
            color:#0d6aad;
            text-align: center;
        }

        .mail_confirm_body a {
            color:#ff0000;
            text-decoration: none;

        }
    </style>
</head>
<body>
<div class="mail_confirm_body" >
    <p>  Please click the below link to reset password </p>
    <a href="<?php echo URL::to('/resetPasswordForm').'/'.$email.'/'.$remember_token?>">Reset Password</a>
</div>

</body>
</html>


