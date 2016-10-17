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
    <h1>Congratulation <?php echo $f_name .'  '.$l_name?> </h1>
    <p> You have successfully registard as a <?php echo $role?> . Please confirm your email ID by clicking the link given below: </p>
    <a href="<?php echo URL::to('/confirmEmail').'/'.$confirmation_code?>">Confirm Email</a>
</div>

</body>
</html>


