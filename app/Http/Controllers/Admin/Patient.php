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
use Validator;
use Hash;
use Auth;
use DateTime;

class Patient extends Controller
{

    //Patient's Dashboard
    public function patientDashboard(){
        $appointment_notification = User::getAppointmentNotificationPatient(Auth::user()->id);
        $appointment_number = count($appointment_notification);
        $data = array(
            'title' => 'Patient Dashboard',
            'all_appointment_notification' => $appointment_number
        );

        return View::make('front_end.pages.dashboard.patient.patient_dashboard')->with($data);
    }



    //After Submission the Patient registration page
    // This function will validate the Form data and insert the values to the database.

    public function addPatient()
    {
        $validation_rule = array(
            'f_name' => array('required', 'between:3,50'),
            'l_name' => array('required', 'between:3,50'),
            'gender'     => array('required'),
            'bloodgroup' => array(''),
            'nidno' => array('required', 'unique:users', 'max:25'),
            'about'      => array(''),
            'mobile'     => array('required', 'digits_between:11,14'),
            'email'      => array('required', 'email', 'unique:users'),
            'username'   => array('required', 'between:3,50','unique:users'),
            'password'   => array('required', 'between:6,20'),
            'password'   => array('required', 'confirmed'),
        );

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
                    $image = Input::file('image');
                    $destinationPath = 'public/uploads/profile';
                    $filename = $image->getClientOriginalName();
                    Input::file('image')->move($destinationPath, $filename);
                }

            } else {

                $filename = '';
            } //End of the Image validation else

            $confirmation_code = str_random(30);

            //Insert data into db
            $patientInfo = array(
                'f_name'            => Input::get('f_name'),
                'l_name'            => Input::get('l_name'),
                'gender'            => Input::get('gender'),
                'bloodgroup'        => Input::get('bloodgroup'),
                'nidno'             => Input::get('nidno'),
                'about'             => Input::get('about'),
                'image'             => $filename,
                'mobile'            => Input::get('mobile'),
                'email'             => Input::get('email'),
                'username'          => Input::get('username'),
                'password'          => Hash:: make(Input::get('password')),
                'role'              => Input::get('role'),
                'status'            => 0,
                'mailconfirm'       => 0,
                'confirmation_code' => $confirmation_code
            );

            $patient_id = User::createUser($patientInfo);

            //Send a mail to the Patient with this data
            $data = array(
                'id'                => $patient_id,
                'f_name'            => Input::get('f_name'),
                'l_name'            => Input::get('l_name'),
                'role'              => Input::get('role'),
                'confirmation_code' => $confirmation_code
            );

            // Email Sending Part
            Mail::send('emails.email_conformation', $data, function ($message) {
                $message->from(getAdminEmail(), 'Telemedicine');
                $message->subject('Email Confiormation for Telemedicine Account ');
                $message->to(Input::get('email'));
            });

            // Redriect to a new page with Email chacking massege.
            return Redirect::to('/registrationSuccessMassege');
        }
    }


    // Edit Patient Profile

    public function editPatient(){
        $id = Auth::user()->id;
        $patient = User::getPatientinfo($id);
        $data = array(
            'title'=>'Edit Patient',
            'patient_info'=> $patient
        );

        return View::make('front_end.pages.form.patient_edit')->with($data);
    }


    // Update Patient profile
    public function updatePatient(){
        $id    = Input::get('id');
        $image = Input::get('image');
        $validation_rule = array(
            'f_name'             => 'required|alpha_dash|between:3,50',
            'l_name'             => 'required|alpha_dash|between:3,50',
            'gender'             => 'required',
            'bloodgroup'         => '',
            'nidno'              => 'required|digits:17|unique:users,nidno,'.$id,
            'about'              => '',
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


            $patientInfo = array(
                'f_name'             => Input::get('f_name'),
                'l_name'             => Input::get('l_name'),
                'gender'             => Input::get('gender'),
                'bloodgroup'         => Input::get('bloodgroup'),
                'nidno'              => Input::get('nidno'),
                'about'              => Input::get('about'),
                'image'              => $filename,
                'mobile'             => Input::get('mobile'),
                'email'              => Input::get('email'),
            );

            User::updatePatient($patientInfo,$id);

            // Redriect to a new page with Email chacking massege.
            return Redirect::to('/patientDashboard')->with('success_massege','Profile Edited Successfully.');
        }
    }


    // All Patient's information
    public function allPatients()
    {

        $all_patients = User::getAllPatients();
        $data = array(
            'title' => 'All Patients',
            'all_patients' => $all_patients,);

        return view::make('admin.pages.all_patients')->with($data);
    }

    // Get all Inactive Patient

    public function allInActivePatients(){
        $all_inactive_patients = User::getAllInactivePatients();
        $data = array(
            'title' => 'All Patients',
            'all_inactive_patients' => $all_inactive_patients,);

        return view::make('admin.pages.all_inactive_patients')->with($data);
    }


    // Activate Account And Send mail to the User

    public function activatePatient($id)
    {
        User:: activatePatient($id);
        $user_email = User::getUserEmail($id);
        $data = array(
            'email' => $user_email,
            'from' => getAdminEmail(),
            'from_name' => 'Tele medicine',);

        Mail::send('emails.activation_confirmation', $data, function ($message) use ($data) {

            $message->to($data['email'])
                ->from($data['from'], $data['from_name'])
                ->subject('Tele-Medicine Account Activeted Successfully!');
        });

        return Redirect::back()->with('activetion_success', 'Account Activeted Successfully.');
    }


    //Deactivate Patient's account
    public function deactivatePatient($id)
    {
        User::deactivatePatient($id);

        return Redirect::back()->with('deactivetion_success', 'Account Deactiveted Successfully.');
    }


    // Get patient Details using Ajax request
    public function patientDetails(){
        $id = $_POST['id'];
        $patient_detail_info = User::getRegisterdUserInfo($id);
        return $patient_detail_info;
    }

    // Get Appointment Detail for Ajax Request
     public function inactiveAppointDetails(){
         $id = $_POST['id'];
         $inactive_appointment_detail = User::getAppointmentInfo($id);
         return $inactive_appointment_detail;
     }


    // Trash Patient Account
    public function trashPatient($id){
        User::trashPatient($id);
        return Redirect::back()->with('activetion_success', 'Patient Trashed Successfully.');
    }

    //All Trased Patient
    public function allTrasPatients() {
        $all_trash_patients = User::getAllTrashedPatient();
        $data = array(
            'title' => 'All Trash Patient',
            'all_trash_patients' => $all_trash_patients
        );
        return view::make('admin.pages.all_trash_patients')->with($data);
    }

    // Retrive Doctor
    public function retrivePatient($id){
        User::retrivePatient($id);
        return Redirect::back()->with('activetion_success', 'Account Retrived Successfully.');
    }


    // Delete Patient
    public function deletePatient($id){
        User::deletePatient($id);
        return Redirect::back()->with('activetion_success', 'Account Deleted Successfully.');
    }

    // Search doctor for making appointment
    public function searchDoctorForAppointment(){

        $data = array(
            'title'      => 'Appointment',
            'all_doctor' => User::getAllDoctor()
        );
        return view::make('front_end.pages.dashboard.patient.doctor_appointment_system')->with($data);
    }

    // Make A appointment
   public function makeAppointment($id){
       $doctor_info = User::getDoctorinfo($id);

       $data = array(
           'title'       => 'Appointment',
           'doctor_info' => $doctor_info
       );
       return view::make('front_end.pages.dashboard.patient.make_appointment')->with($data);
   }


    // Save Appointment Dada
    public function saveAppointmentData(){
        $doctor_id  = Input::get('id');
        if (isset($doctor_id)) {
            $selected_doctor_id = $doctor_id;
        } else {
            $selected_doctor_id = '';
        }

        $patient_id = Auth::id();
        $now = new DateTime();

        $validation_rule = array(
            'communication_type'  => 'required',
            'problem'             => 'required',
            'convenient_time' => 'required'
        );

        //Validation check
        $validation = Validator::make(Input::all(), $validation_rule);

        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        } else {

            // insert Value into the Appointment Table
            $appoint_data_to_save = array(
                'communication_type'  => Input::get('communication_type'),
                'problem'             => Input::get('problem'),
                'patient_time' => Input::get('convenient_time'),
                'appointment_type' => Input::get('appointment_type'),
                'doctor_id' => $selected_doctor_id,
                'patient_id'          => $patient_id,
                'status'              => 1,
                'created_at'          => $now
            );

            User::saveAppointmentData($appoint_data_to_save);

            //Send a mail to the Doctor
            $data = array(
                'id'                => $doctor_id,
                'f_name'            => Input::get('f_name'),
                'l_name'            => Input::get('l_name'),
                'patient_f_name'    => Auth::user()->f_name,
                'patient_l_name'    => Auth::user()->l_name,

            );

            if (Input::get('appointment_type') === 'custom') {
                // Send email to the Doctor with cc to the admin
            Mail::send('emails.appointment_alert_to_doctor', $data, function ($message) {
                $message->from(getAdminEmail(), 'Telemedicine');
                $message->subject('A New Appointment has been created');
                $message->to(Input::get('email'));
                $message->cc(getAdminEmail());
            });
            } else {
                // Send Mail to the
                Mail::send('emails.appointment_alert_to_admin', $data, function ($message) {
                    $message->from(getAdminEmail(), 'Telemedicine');
                    $message->subject('A New Appointment has been created');
                    $message->to(getAdminEmail());
                });
            }
            // Email Sending Part


            return Redirect::to('/appoinmentCreatSuccess');
        }
    }

    // Appointment create Successfully Massege Showing Page
    public function appoinmentCreatSuccess(){
        $data = array(
            'title' => 'Appointment '
        );

        return View::make('front_end.pages.appointment_create_success_massege')->with($data);
    }

    // Appointment Setup List

    public function allSetAppointmentResponstList()
    {
        $all_respons_list = User::getAppointmentNotificationPatient(Auth::user()->id);
        $data = array(
            'title' => 'Respons List',
            'all_respons_list' => $all_respons_list
        );

        return View::make('front_end.pages.dashboard.patient.all_set_appointment_respons_list')->with($data);
    }


    // Count All AppointmentRespons from Doctor

    public function appointmentConfirm($id, $email)
    {
        User::appointmentConfirm($id);

        $data = array('email' => $email);

        // Send Mail to the

        $data = array(
            'email' => $email,
            'from' => getAdminEmail(),
        );
        // Send Mail to the
        Mail::send('emails.appointment_setup_confirm', $data, function ($message) use ($data) {
            $message->to($data['email'])->from($data['from'])->subject('Appointment Setup Confirm');
        });

        return Redirect::back()->with('success_massege', 'Appointment Confirm Success!');
    }

    // Delete Appointment by Patient

    public function appointmentDelete($id, $email)
    {
        User::appointmentDelete($id);

        $data = array(
            'email' => $email,
            'from' => getAdminEmail(),
        );
        // Send Mail to the
        Mail::send('emails.appointment_canceled', $data, function ($message) use ($data) {
            $message->to($data['email'])->from($data['from'])->subject('Appointment Cancled by Patient');
        });

        return Redirect::back()->with('success_massege', 'Appointment Deleted Successfully!');
    }

    // Get All Inactive Appointment

    public function getAllInactiveGeneralAppointment(){
        $all_inactive_general_appointment = User:: getGeneralAppointmentNotification();
        $data = array(
            'title' => 'Respons List',
            'all_inactive_general_appointment' => $all_inactive_general_appointment
        );

        return View::make('admin.pages.all_inactive_general_appointment')->with($data);
    }


}
