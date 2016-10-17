<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tele Medicine</title>
    <style>
        .mail_confirm_body {
            border: 1px solid #0d6aad;
            width: 60%;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="mail_confirm_body">
    <h2>Hi! <?php echo $patient_f_name . '   ' . $patient_l_name?></h2>
    Dr. <b>" <?php echo $doctor_f_name . ' ' . $doctor_l_name ?>" </b> has set an appointment with you.To know
    details....
    <a style="text-decoration: none;" href="<?php echo URL::to('/signIn')?>">
        <h2 style=" background: #0d6aad; color:#fff; text-align: center; padding: 10px; border-radius: 5px; width:200px">
            Sign In</h2>
    </a>
</div>

</body>
</html>