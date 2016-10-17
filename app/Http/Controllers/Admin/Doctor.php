<?php

namespace App\Http\Controllers\Admin;

use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;
use Mail;
use Auth;
use Validator;
use Hash;



class Doctor extends Controller
{

    //Doctor's Dashboard
    public function doctorDashboard(){
        $doctor_id = Auth::id();
        $appointment_number = count(User:: getAppointmentNotification($doctor_id));
        $data = array(
            'title'                   => 'Doctor Dashboard',
            'appointment_number'=> $appointment_number
        );

        return View::make('front_end.pages.dashboard.doctor_dashboard')->with($data);
    }

    //After Submission of doctor's Registration Form
    //This function will Validete the form and Insert the values to the database.

    public function addDoctor()
    {
        // Validation Rule
        $validation_rule = array(
            'f_name' => array('required', 'between:3,50'),
            'l_name' => array('required', 'between:3,50'),
            'gender'             => array('required'),
            'bloodgroup'         => array(''),
            'nidno' => array('required', 'unique:users', 'max:25'),
            'about'              => array(''),
            'medical_reg_no'     => array('required', ''),
            'p_job'              => array('required'),
            'medical_speciality' => array('required'),
            'mobile'             => array('required', 'digits_between:11,14','unique:users'),
            'email'              => array('required', 'email', 'unique:users'),
            'username'           => array('required', 'between:3,50','unique:users'),
            'password'           => array('required', 'between:6,20'),
            'password'           => array('required', 'confirmed'),
        );

        //Validation check
        $validation = Validator::make(Input::all(), $validation_rule);

        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        } else {

            //When validation Passed
            //Start Image validation
            if (Input::hasFile('image')) {

                $input     = array('image' => Input::file('image'));
                $rules     = array('image' => 'image');
                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    return Redirect::back()->with('image_validation_error', 'Image file is not valid !');
                } else {
                    //Upload the image and get the image file name.
                    $image           = Input::file('image');
                    $destinationPath = 'public/uploads/profile';
                    $filename        = $image->getClientOriginalName();
                    Input::file('image')->move($destinationPath, $filename);
                } // End of the Image validation

            } else {

                $filename = '';
            } //End of the Image validation else

            $confirmation_code = str_random(30);

            //Insert data into db
            $doctorInfo = array(
                'f_name'             => Input::get('f_name'),
                'l_name'             => Input::get('l_name'),
                'gender'             => Input::get('gender'),
                'bloodgroup'         => Input::get('bloodgroup'),
                'nidno'              => Input::get('nidno'),
                'about'              => Input::get('about'),
                'image'              => $filename,
                'medical_reg_no'     => Input::get('medical_reg_no'),
                'p_job'              => Input::get('p_job'),
                'medical_speciality' => Input::get('medical_speciality'),
                'mobile'             => Input::get('mobile'),
                'email'              => Input::get('email'),
                'username'           => Input::get('username'),
                'password'           => Hash:: make(Input::get('password')),
                'role'               => Input::get('role'),
                'status'             => 0,
                'mailconfirm'        => 0,
                'confirmation_code'  => $confirmation_code
            );

            $doctor_id = User::createUser($doctorInfo);

            //Send a mail to the Doctor
            $data = array(
                'id'                => $doctor_id,
                'f_name'            => Input::get('f_name'),
                'l_name'            => Input::get('l_name'),
                'role'              => Input::get('role'),
                'confirmation_code' => $confirmation_code
            );

            Mail::send('emails.email_conformation', $data, function ($message) {
                $message->from(getAdminEmail(), 'Telemedicine');
                $message->subject('Email Confiormation for Telemedicine Account ');
                $message->to(Input::get('email'));
            });

            // Redriect to a new page with Email chacking massege.
            return Redirect::to('/registrationSuccessMassege');
        }
    }





    //Doctor Profile Edit
    public function editDoctor(){
        $id = Auth::user()->id;
        $doctor = User::getDoctorinfo($id);
        $data = array(
            'title'=>'Edit Doctor',
            'doctor_info'=> $doctor
        );

        return View::make('front_end.pages.form.doctor_edit')->with($data);
    }



    // Update Doctor
    public function updateDoctor(){
        $id    = Input::get('id');
        $image = Input::get('image');
        $validation_rule = array(
            'f_name'             => 'required|alpha_dash|between:3,50',
            'l_name'             => 'required|alpha_dash|between:3,50',
            'gender'             => 'required',
            'bloodgroup'         => '',
            'nidno'              => 'required|digits:17|unique:users,nidno,'.$id,
            'about'              => '',
            'medical_reg_no'     => 'required',
            'p_job'              => 'required',
            'medical_speciality' => 'required',
            'mobile'             => 'required|digits_between:11,14|unique:users,mobile,'.$id,
            'email'              => 'required|email|unique:users,email,'.$id,
        );

        //Validation check
        $validation = Validator::make(Input::all(), $validation_rule);

        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        } else {
            //When validation Passed
            //Start Image validation

            if (Input::hasFile('image')) {
                $input     = array('image' => Input::file('image'));
                $rules     = array('image' => 'image');
                $validator = Validator::make($input, $rules);


                if ($validator->fails()) {
                    return Redirect::back()->with('image_validation_error', 'Image file is not valid !');
                } else {

                    //Upload the image and get the image file name.
                    $image           = Input::file('image');
                    $destinationPath = 'public/uploads/profile';
                    $filename        = $image->getClientOriginalName();
                    Input::file('image')->move($destinationPath, $filename);
                } // End of the Image validation

            } else {

                $filename = $image;
            } //End of the Image validation else


            $doctorInfo = array(
                'f_name'             => Input::get('f_name'),
                'l_name'             => Input::get('l_name'),
                'gender'             => Input::get('gender'),
                'bloodgroup'         => Input::get('bloodgroup'),
                'nidno'              => Input::get('nidno'),
                'about'              => Input::get('about'),
                'image'              => $filename,
                'medical_reg_no'     => Input::get('medical_reg_no'),
                'p_job'              => Input::get('p_job'),
                'medical_speciality' => Input::get('medical_speciality'),
                'mobile'             => Input::get('mobile'),
                'email'              => Input::get('email'),
            );

            User::updateDoctor($doctorInfo,$id);

            // Redriect to a new page with Email chacking massege.
            return Redirect::to('/doctorDashboard')->with('edit_success_success','Profile Edited Successfully.');
        }
    }


    // Get All Doctor's information
    public function allDoctors()
    {
        $all_doctors = User::getAllDoctor();
        $data = array(
            'title' => 'All Doctor',
            'all_doctors' => $all_doctors
        );
        return view::make('admin.pages.all_doctor')->with($data);
    }


    //All Trased Doctor
    public function getAllTrasDoctor() {
        $all_trash_doctors = User::getAllTrashedDoctor();
        $data = array(
            'title' => 'All Trash Doctor',
            'all_trash_doctors' => $all_trash_doctors
        );
        return view::make('admin.pages.all_trash_doctors')->with($data);
    }


    // Delete Doctor
    public function deleteDoctor($id){
        User::deleteDoctor($id);
        return Redirect::back()->with('activetion_success', 'Account Deleted Successfully.');
    }


    // Retrive Doctor
    public function retriveDoctor($id){
        User::retriveDoctor($id);
        return Redirect::back()->with('activetion_success', 'Account Retrived Successfully.');
    }


    // Activate Account And Send mail to the User

    public function activateDoctor( $id )
    {
        User:: activateDoctor($id);
        $user_email = User::getUserEmail($id);
        $data = array( 'email' => $user_email, 'from' => getAdminEmail(), 'from_name' => 'Tele medicine' );

        Mail::send('emails.activation_confirmation', $data, function ( $message ) use ( $data ) {
            $message->to($data[ 'email' ])->from($data[ 'from' ], $data[ 'from_name' ])->subject('Tele-Medicine Account Activeted Successfully!');
        });

        return Redirect::back()->with('activetion_success', 'Account Activeted Successfully.');
    }



    // All inactive Doctor
    public function getAllInactiveDoctor(){
        $all_inactive_doctors = User::getAllInactiveDoctor();
        $data = array(
            'title' => 'All Doctor',
            'all_inactive_doctors' => $all_inactive_doctors
        );
        return view::make('admin.pages.all_inactive_doctors')->with($data);

    }


    //Deactivate Doctor account
    public function deactivateDoctor( $id )
    {
        User:: deactivateDoctor($id);
        return Redirect::back()->with('deactivetion_success', 'Account Deactiveted Successfully.');
    }

    // Trash Doctor Account
    public function trashDoctor($id){
        User::trashDoctor($id);
        return Redirect::back()->with('activetion_success', 'Doctor Trashed Successfully.');
    }


    // Doctor Details info Using Ajax Request
    public function doctorDetails(){
//        $id = $_POST['id'];
        $id = Input::get('id');
        $doctor_detail_info = User::getRegisterdUserInfo($id);
        return $doctor_detail_info;
    }

    // Get Appointment Notification

    public function getAppointmentNotification(){
        $doctor_id = Auth::id();
        $pending_appointments = User:: getAppointmentNotification($doctor_id);

        $data = array(
            'title'                   => 'Doctor Dashboard',
            'pending_appointments'      => $pending_appointments
        );

        return View::make('front_end.pages.dashboard.doctor.pending_appointment_list')->with($data);
    }

   // Set Appointment

    public function setAppointment($id){
        $appointment_info = User::getAppointmentInfo($id);

        $data = array(
            'title'       => 'Appointment',
            'appointment_info' => $appointment_info
        );
        return view::make('front_end.pages.dashboard.doctor.set_appointment')->with($data);
    }

    //Save Set Appointment data
    public function saveSetAppointmentData()
    {

        $validation_rule = array(
            'advice' => 'required',
            'convenient_time' => 'required'
        );

        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        } else {
            User::saveSetAppointmentData(Input::get('appoint_id'), Input::get('advice'), Input::get('convenient_time'));

            //Send a mail to the Doctor
            $data = array(
                'patient_f_name' => Input::get('patient_f_name'),
                'patient_l_name' => Input::get('patient_l_name'),
                'doctor_f_name' => Auth::user()->f_name,
                'doctor_l_name' => Auth::user()->l_name,
            );

            // Send Mail to the
            Mail::send('emails.doctor_respons_alert_to_patient', $data, function ($message) {
                $message->from(getAdminEmail(), 'Telemedicine');
                $message->subject("Doctor's Respons");
                $message->to(Input::get('patient_email'));
            });
            // Redriect to getAppointmentNotification page with success massege.
            return Redirect::to('/getAppointmentNotification')->with('success_massege', 'Appointment Setup Success.');
        }
    }

    //All

}
