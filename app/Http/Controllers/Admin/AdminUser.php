<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use View;
use App\User;

use Hash;
use Redirect;


class AdminUser extends Controller {

    
    //Admin login Form
    public function loginForm() {
        $data = array(
            'title' => 'Login Page'
        );
        return view::make('admin.pages.login_form')->with($data);
    }

    
    // Admin Login Check
    public function adminLoginCheck() {

        $validation_rule = [
            'username' => array('required', 'min:3', 'max:50'),
            'password' => array('required', 'min:6', 'max:50')
        ];

        $validation = Validator::make(Input::all(), $validation_rule);

        if ($validation->fails()) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors($validation);
        } else {
            $athentication_username = Auth::attempt(array('username' => Input :: get('username'), 'password' => Input :: get('password'), 'status' => 1,'mailconfirm'=> 1,'trash'=> 0 ));
            $athentication_email = Auth::attempt(array('email' => Input :: get('username'), 'password' => Input :: get('password'), 'status' => 1,'mailconfirm'=> 1,'trash'=> 0 ));
            $athentication_mobile = Auth::attempt(array('mobile' => Input :: get('username'), 'password' => Input :: get('password'), 'status' => 1,'mailconfirm'=> 1,'trash'=> 0 ));

            if ($athentication_username || $athentication_email || $athentication_mobile) {
                $rememberme = Input::get('remember');
                if (!empty($rememberme)) {
                    //Remember Login data
                    Auth::loginUsingId(Auth::user()->id, true);
                }
                $role = Auth::user()->role;

                switch ($role) {
                    case 'admin':
                        return Redirect::intended('adminDashboard');
                        break;
                    case 'doctor':
                        return Redirect::intended('doctorDashboard');
                        break;
                    case 'patient':
                        return Redirect::intended('patientDashboard');
                        break;
                    default :
                        return Redirect::intended('adminDashboard');
                    
                }
                
            }  else {//Athentication End
                return Redirect::back()->withInput()->with('authentication_error', 'Invalid username/Password!');
            }
        }
    }
    
    
    //Log Out
    public function getLogOut(){
        Auth::logout();
        return redirect('/');
    }


   // Admin Profile Page

    public function adminProfile(){
        $data = array(
            'title' => 'Admin Profile'
        );
        return View::make('admin.pages.admin_profile')->with($data);
    }


    //Admin Profile update

    public function updateAdminProfile(){

        $id = Auth::id();
        $validation_rule = array(
            'f_name' => array('required', 'alpha_dash', 'between:3,50'),
            'l_name' => array('required', 'alpha_dash', 'between:3,50'),
            'email' => array('required', 'email','unique:users,email,'.$id),
            'mobile' => array('required', 'digits_between:10,14','unique:users,mobile,'.$id),
            'password' => array('between:6,20','confirmed'),
            'password_confirmation' => array( 'between:6,20'),
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
                $input = array('image' => Input::file('image'));
                $rules = array(
                    'image' => 'image'
                );
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
            }else {

                $filename = Input::get('image');
            } //End of the Image validation else

            if (Input::get('password')== ''){
                $password = '';

            }else{
                $password =  Hash:: make(Input::get('password'));
            }

            //get password from hidden field of the update form page
            $id = Input::get('id');

            //Update  admin data into db
            $admin = array(
                'f_name' => Input::get('f_name'),
                'l_name' => Input::get('l_name'),
                'image' => $filename,
                'mobile' => Input::get('mobile'),
                'email' => Input::get('email'),
                'password' => $password,
            );

             User::updateAdmin($admin,$id);

            // Redriect to a new page with Email chacking massege.
            return Redirect::back()->with('update_success_massege',' Admin profile Update Successfully');
        }
    }



    // Admin Dashboard
    public function adminDashboard(){
        $data = array(
            'title' => 'Admin Dashboard'
        );
        return View::make('admin.pages.admin_dashboard')->with($data);  
    }


    // Search Doctor For Assign General Appointment

    public function searchDoctorForAssignGeneralAppointment($appointment_id){
        $data = array(
            'title'      => 'Search Doctor ',
            'all_doctor' => User::getAllDoctor(),
            'appointment_id'     => $appointment_id
        );
        return View::make('admin.pages.search_doctor_for_general_assignment')->with($data);
    }

    //Assign Appointment to the Doctor

    public function assignAppointmentToDoctor($doctor_id,$appointment_id){
        User:: assignAppointmentToDoctor($doctor_id,$appointment_id);
        return Redirect::back()->with('activetion_success',' Doctor Assigened Successfully');
    }


    //

    public  function  doctorDetailModalInGeneralAssignment(){
        $id = Input::get('id');
        $doctor_detail_info = User::getRegisterdUserInfo($id);
        return $doctor_detail_info;
    }

}
