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
    <h2>Hi Admin,</br>
         A new user <?php echo $registerd_user_info->f_name .' '. $registerd_user_info->l_name?> has registerd  as a <?php echo $registerd_user_info->role.'.'?> </h2>
         <h3>Please Activate the Account</h3>
         <a href="<?php echo URL::to('/activateDoctor').'/'.$registerd_user_info->id?>">Activate Account</a>
</div>

</body>
</html>


