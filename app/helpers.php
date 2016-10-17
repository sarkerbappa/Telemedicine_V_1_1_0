<?php
/**
 * Created by PhpStorm.
 * User: Bappa
 * Date: 4/5/2016
 * Time: 1:20 PM
 */



 function getAdminEmail(){

     $admin_email = DB::table('users')
                   ->select('email as user_email')
                   ->where('role','admin')
                   ->get();
     return $admin_email[0]->user_email;
 }

?>