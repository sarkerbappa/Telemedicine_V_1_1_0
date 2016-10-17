<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use App\User;
use Hash;
use Mail;
use Auth;


class HomeController extends Controller
{


    //Load Home Page
    public function homePage()
    {
        $data = array(
            'title' => 'Home',
            'admin_email' => getAdminEmail()
        );
        return View::make('front_end.home')->with($data);
    }



    // Join Page

    public function joinPage()
    {
        $data = array(
            'title' => 'Join Details'
        );
        return View::make('front_end.pages.more_details.join_page')->with($data);
    }



    // Doctors details page
    public function doctorRegDetail()
    {
        $data = array(
            'title' => 'Doctor registration Details'
        );
        return View::make('front_end.pages.more_details.about_doctor_registration')->with($data);

    }


    //Doctor singup form

    public function signUpDoctor()
    {
        $data = array(
            'title' => 'Doctor SignUp Form'
        );
        return View::make('front_end.pages.form.doctor_sign_up_form')->with($data);
    }



    // Patients details page
    public function patientRegDetail()
    {
        $data = array(
            'title' => 'Patient registration Details'
        );
        return View::make('front_end.pages.more_details.about_patient_registration')->with($data);

    }



    //Patient Sign upForm

    public function signUpPatient()
    {
        $data = array(
            'title' => 'Patient Sing Up Form'
        );
        return View::make('front_end.pages.form.patient_sign_up_form')->with($data);
    }



    // Registration Success massege Page load

    public function registrationSuccessMassege()
    {
        $data = array(
            'title' => 'Confirm Massege'
        );
        return View::make('front_end.pages.reg_success_massege')->with($data);
    }




    //Email ID Confirmation

    public function confirmEmail($confirmation_code)
    {
        if (!$confirmation_code) {
            return View::make('missing_confirmation_code');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();
        if (!$user) {
            return View::make('missing_confirmation_code');
        }

        $user->mailconfirm = 1;
        $user->confirmation_code = null;
        $user->save();

        $data = array(
            'title' => 'Email Confirmation Success',
            'registerd_user_info' => $user
        );

        Mail::send('emails.emailconfiorm_to_admin', $data, function ($message) {
            $message->from(getAdminEmail(), 'Telemedicine');
            $message->subject('Email Confiormed ');
            $message->to(getAdminEmail());
        });

        return View::make('front_end.pages.mail_conform_success_massege')->with($data);

    }




    //Sign In page

    public function signIn()
    {
        $data = array(
            'title' => 'Sing In'
        );
        return View::make('front_end.pages.form.sign_in_form')->with($data);
    }

    //Forgot password
    public function forgotPassword(){
        $data = array(
            'title' => 'Forgot Password'
        );
        return View::make('front_end.pages.form.forgot_password_form')->with($data);
    }

    //Send password reset link to the email

    public function forgotPasswordSendMail(){
        $validation_rule = array(
            'email' => array('email','required'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }else{
            $check_email_is_exist = User::CheckEmailIsExis(Input::get('email'));
            if (count($check_email_is_exist) > 0) {
                $token = str_random(30);
                User::InsertTokenNumberIntoDatabase(Input::get('email'),$token);

                //Send a mail to the User with Remember token
                $data = array(
                    'remember_token' => $token,
                    'email'          => Input::get('email')
                );

                Mail::send('emails.forgote_password_email', $data, function ($message) {
                    $message->from(getAdminEmail(), 'Telemedicine');
                    $message->subject('Reset Password for Telemedicine Account ');
                    $message->to(Input::get('email'));
                });
                // Redriect to a new page with Email chacking massege.
                return Redirect::to('/checkEmailForPasswordReset');

            }else{
                return Redirect::back()
                    ->withInput()->with('email_not_exist_massege','This Email is Not Exist in Database!');
            }
    }
    }


    // Check your  Email
    public function checkEmailForPasswordReset(){
        $data = array(
            'title' => 'Check Email for Password Reset'
        );
        return View::make('front_end.pages.check_email_for_password_reset')->with($data);
    }

    //Reset password Form

    public function resetPasswordForm($email,$token){
        //Check email and token matching
       $token_in_db =  User::getRememberTokenAccordingToEmail($email);
        if($token_in_db[0] === $token){
            $data = array(
                'title' => 'Password Reset Form',
                'email' => $email
            );

            return View::make('front_end.pages.form.password_reset_form')->with($data);
        }else{
            echo'Validity of the token is passed.';
        }
    }

    // reset New ForgottenPassword
    public function resetForgotPassword(){
        $validation_rule = array(
            'new_password' => array('between:6,20','required','confirmed'),
            'new_password_confirmation' => array( 'between:6,20','required'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }else{
            $password = Hash::make(Input::get('new_password'));
            User::resetForgotPasswordSave($password,Input::get('email'));
            User::deleteRememberToken(Input::get('email'));
            return View::make('front_end.pages.forgot_password_reset_success')->with( ['title' => 'Password Reset']);
        }
    }



    //Change password

    public function changePassword(){
        $data = array(
            'title' => 'Change Password'
        );
        return View::make('front_end.pages.form.change_password')->with($data);
    }

    // change Password update
    public function changePasswordUpdate(){

        $validation_rule = array(
            'old_password' => array('between:6,20','required'),
            'new_password' => array('between:6,20','required','confirmed'),
            'new_password_confirmation' => array( 'between:6,20','required'),
        );

        $validation = Validator::make(Input::all(), $validation_rule);

        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        } else {

            $password = Hash::make(Input::get('new_password'));
            $old_password   = Input::get('old_password');
            $hashedPassword = Auth::user()->password;

            if (Hash::check($old_password, $hashedPassword)) {
                User::changePassword(Auth::user()->id,$password);
                return Redirect::back()->with('password_change_success','Password Changed Successfully.');
            }else{
                return Redirect::back()->with('old_pass_error','Old Password Not Correct!');
            }
        }
    }


}
