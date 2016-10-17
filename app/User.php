<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{

    public $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['*'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   // Check role rof middleware
    public function hasRole($role)
    {
        return ($this->role == $role) ? true : false;
    }


    //Update Admin profile

    static function updateAdmin($admin, $id)
    {
        if (empty($admin['password'])) {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'f_name' => $admin['f_name'],
                    'l_name' => $admin['l_name'],
                    'image'  => $admin['image'],
                    'mobile' => $admin['mobile'],
                    'email'  => $admin['email'],
                ]);

        } else {
            DB::table('users')
                ->where('id', $id)
                ->update($admin);
        }
    }

    // Check Email for Password, if the email is exist in the DB
    static function CheckEmailIsExis($email){
        $user_email = DB::table('users')
            ->where('email', $email)->get();
        return $user_email;
    }

    // Get Remember token according to the email
    static function getRememberTokenAccordingToEmail($email){
     $token_in_db = DB::table('users')->where('email', $email)->pluck('remember_token');
        return $token_in_db;
    }


    // Update Token number according to email
    static function InsertTokenNumberIntoDatabase($email,$token){
        DB::table('users')
            ->where('email', $email)
            ->update(['remember_token' => $token]);

    }



    // Reset Password save
    static function resetForgotPasswordSave($password,$email){
        DB::table('users')
            ->where('email', $email)
            ->update(['password' => $password]);
    }

    //Delete Remember token

    static function deleteRememberToken($email){
        DB::table('users')
            ->where('email', $email)
            ->update(['remember_token' => '']);
    }

    //Create Doctor
    static function createUser($userInfo)
    {
        $user_id = DB::table('users')->insertGetId($userInfo);
        return $user_id;
    }


    // Ajax request,  Get all info of a user by id
    static function getRegisterdUserInfo($id)
    {
        $userinfo = DB::table('users')
            ->where('id', $id)->get();
        return $userinfo;
    }


    // Get Doctor's information For editing
    static function getDoctorinfo($id){
        $doctorinfo = DB::table('users')
            ->where('id', $id)->first();
        return $doctorinfo;
    }


    // Update Doctor info to the database
    static function updateDoctor($doctorInfo,$id){
        DB::table('users')
            ->where('id', $id)
            ->update($doctorInfo);
    }


    //Get User Email
    static function getUserEmail($id)
    {
        $user_email = DB::table('users')->where('id', $id)->value('email');
        return $user_email;
    }


    // get all doctor
    static function getAllDoctor()
    {
        $all_doctors = DB::table('users')
            ->where('role', 'doctor')
            ->where('mailconfirm', '1')
            ->where('trash', '0')
            ->get();
        return $all_doctors;
    }


    //get all trash doctor
    static function getAllTrashedDoctor(){
        $all_trash_doctors = DB::table('users')
            ->where('role', 'doctor')
            ->where('trash', '1')
            ->get();
        return $all_trash_doctors;
    }


    //Activet Doctor Account
    static function activateDoctor($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);
    }


    //Deactivet Doctor Account
    static function deactivateDoctor($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);
    }


    // Trash Doctor
    static function trashDoctor($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['trash' => 1]);
    }

    // Retrive Doctor
    static function retriveDoctor($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['trash' => 0]);
    }

    // Delete Doctor
    static function deleteDoctor($id){
        DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    //All Inactive

    static function getAllInactiveDoctor(){
        $get_all_inactive_doctor = DB::table('users')
            ->where('role', 'doctor')
            ->where('status', 0)
            ->where('mailconfirm', '1')
            ->get();
        return $get_all_inactive_doctor;

    }

    // All Inactive users for notification
   static function getAllinactiveUsers(){
       $get_all_inactive_users = DB::table('users')
                               ->where('status', 0)
                               ->where('mailconfirm', '1')
                               ->get();
       return $get_all_inactive_users;
   }

    //  Patient Related

    //get All patient
    static function getAllPatients()
    {
        $all_patients = DB::table('users')
            ->where('role', 'patient')
            ->where('mailconfirm', '1')
            ->where('trash', '0')
            ->get();
        return $all_patients;
    }

    //get all inactive patient
    static function getAllInactivePatients(){
        $get_all_inactive_patient = DB::table('users')
            ->where('role', 'patient')
            ->where('status', 0)
            ->where('mailconfirm', '1')
            ->get();
        return $get_all_inactive_patient;

    }


    //Activate Patient Account
    static function activatePatient($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);
    }

     // Get patient information fore diting

    static function getPatientinfo($id){
        $patientinfo = DB::table('users')
            ->where('id', $id)->first();
        return $patientinfo;
    }

    // Updating Patient

    static function updatePatient($patientInfo,$id){
        DB::table('users')
            ->where('id', $id)
            ->update($patientInfo);
    }

    //Deactivate Patient  Account
    static function deactivatePatient($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);
    }

    //Trash Patient
    static function trashPatient($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['trash' => 1]);
    }

    //get all trash patient
    static function getAllTrashedPatient(){
        $all_trash_patients = DB::table('users')
            ->where('role', 'patient')
            ->where('trash', '1')
            ->get();
        return $all_trash_patients;
    }

    // Retrive Patient
    static function retrivePatient($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['trash' => 0]);
    }
    // Delete Doctor
    static function deletePatient($id){
        DB::table('users')
            ->where('id', $id)
            ->delete();
    }
    // Password Changed
    static function  changePassword($id,$password){
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => $password]);
    }

    // Insert make Appointment information into the Appointment Table
    static function  saveAppointmentData($appoint_data_to_save){
        DB::table('appointment')
            ->insert($appoint_data_to_save);
    }

    // Get Doctor Appointment Notification for doctor
    static function getAppointmentNotification($id){

        $pending_appointment= DB::table('appointment')
            ->join('users', function ($join) use ($id) {
                $join->on('users.id', '=', 'appointment.patient_id')
                    ->where('appointment.doctor_id', '=', $id)
                    ->where('appointment.status', '=', 1)
                    ->where('appointment.doctor_response', '=', 0)
                ;
            })
            ->select('users.id','users.f_name','users.l_name','users.image','users.mobile','appointment.created_at','appointment.communication_type','appointment.appoint_id')->get();
        return $pending_appointment;

    }

    //Get appointment Notification for Patient
    static function getAppointmentNotificationPatient($id)
    {
        $pending_appointment_for_patient = DB::table('appointment')
            ->join('users', function ($join) use ($id) {
                $join->on('users.id', '=', 'appointment.doctor_id')
                    ->where('appointment.patient_id', '=', $id)
                    ->where('appointment.status', '=', 1)
                    ->where('appointment.doctor_response', '=', 1)
                    ->where('appointment.patient_respons', '=', 0);
            })
            ->select('users.id', 'users.email', 'users.f_name', 'users.l_name', 'users.image', 'users.mobile', 'appointment.created_at', 'appointment.appoint_id', 'appointment.doctor_time', 'appointment.doctor_advise')->get();
        return $pending_appointment_for_patient;
    }

    //get appointment information

    static function getAppointmentInfo($id){
        $pending_appointment_info= DB::table('appointment')
            ->join('users', function ($join) use ($id) {
                $join->on('users.id', '=', 'appointment.patient_id')
                    ->where('appointment.appoint_id', '=', $id)
                    ->where('appointment.status', '=', 1)
                ;
            })->select('users.id',
                       'users.f_name',
                       'users.l_name',
                       'users.image',
                       'users.bloodgroup',
                       'users.gender',
                       'users.about',
                       'users.email',
                       'users.mobile',
                       'appointment.created_at',
                       'appointment.patient_time',
                       'appointment.communication_type',
                       'appointment.appoint_id',
                       'appointment.problem'
            )
            ->get();
        return $pending_appointment_info;
    }


    //  Save Set Appointment Data
    static function saveSetAppointmentData($appoint_id, $advice, $convenient_time)
    {
        DB::table('appointment')
            ->where('appoint_id', $appoint_id)
            ->update([
                'doctor_response' => 1,
                'doctor_advise' => $advice,
                'doctor_time' => $convenient_time
            ]);
    }

    //Appointment Confirm
    static function appointmentConfirm($id)
    {
        DB::table('appointment')
            ->where('appoint_id', $id)
            ->update(['patient_respons' => 1]);
    }

    //Appointment Delete
    static function appointmentDelete($id)
    {
        DB::table('appointment')
            ->where('appoint_id', $id)
            ->delete();
    }

    // Get General Appointment notification

    static function getGeneralAppointmentNotification(){
      $all_general_appointment = DB::table('appointment')

          ->join('users', function ($join) {
              $join->on('users.id', '=', 'appointment.patient_id')
                  ->where('appointment_type', '=', 'general')
                  ->where('doctor_id', '=', 0)
              ;
          })->select('users.id',
              'users.f_name',
              'users.l_name',
              'users.image',
              'users.bloodgroup',
              'users.gender',
              'users.about',
              'users.email',
              'users.mobile',
              'appointment.created_at',
              'appointment.patient_time',
              'appointment.communication_type',
              'appointment.appoint_id',
              'appointment.problem'
          )
          ->get();
       return $all_general_appointment;
    }

    // Assign Doctor to general appointment
     static function assignAppointmentToDoctor($doctor_id,$appointment_id){
         DB::table('appointment')
             ->where('appoint_id', $appointment_id)
             ->update(['doctor_id' => $doctor_id]);
     }




}
