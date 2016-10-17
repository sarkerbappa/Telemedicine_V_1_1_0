<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::controllers([
    'password' => 'Auth\PasswordController',
]);


Route::group(['middleware' => ['web']], function () {

    //==========================Bankend  Route================================================//
    
    Route::any('/admin', array('as' => 'admin', 'uses' => 'Admin\AdminUser@loginForm'));
    Route::any('/adminLoginCheck', array('as' => 'adminLoginCheck', 'uses' => 'Admin\AdminUser@adminLoginCheck'));
    Route::group(['middleware' => ['auth']], function () {

        // All Log Out Both frontend and Backend
        Route::get('/logout', array('as' => 'logout', 'uses' => 'Admin\AdminUser@getLogOut'));


        // Admin profile
        Route::group(['middleware' => ['role:admin']], function () {

              Route::any('/adminProfile', array('as' => 'adminProfile', 'uses' => 'Admin\AdminUser@adminProfile'));
              Route::any('/updateAdminProfile', array('as' => 'updateAdminProfile', 'uses' => 'Admin\AdminUser@updateAdminProfile'));

               // Admin Dashboard

               Route::any('/adminDashboard', array('as' => 'adminDashboard', 'uses' => 'Admin\AdminUser@adminDashboard'));
               Route::any('/searchDoctorForAssignGeneralAppointment/{id}', array('as' => 'searchDoctorForAssignGeneralAppointment', 'uses' => 'Admin\AdminUser@searchDoctorForAssignGeneralAppointment'));
               Route::any('/assignAppointmentToDoctor/{doctor_id}/{appoinment_id}', array('as' => 'assignAppointmentToDoctor', 'uses' => 'Admin\AdminUser@assignAppointmentToDoctor'));

               // Doctor
               Route::any('/allDoctors', array('as' => 'allDoctors', 'uses' => 'Admin\Doctor@allDoctors'));
               Route::any('/activateDoctor/{id}', array('as' => 'activateDoctor', 'uses' => 'Admin\Doctor@activateDoctor'));
               Route::any('/deactivateDoctor/{id}', array('as' => 'deactivateDoctor', 'uses' => 'Admin\Doctor@deactivateDoctor'));
               Route::any('/trashDoctor/{id}', array('as' => 'trashDoctor', 'uses' => 'Admin\Doctor@trashDoctor'));
               Route::any('/retriveTrashDoctor/{id}', array('as' => 'retriveDoctor', 'uses' => 'Admin\Doctor@retriveDoctor'));
               Route::any('/deleteDoctor/{id}', array('as' => 'deleteDoctor', 'uses' => 'Admin\Doctor@deleteDoctor'));
               Route::any('/getAllInactiveDoctor', array('as' => 'getAllInactiveDoctor', 'uses' => 'Admin\Doctor@getAllInactiveDoctor'));
               Route::any('/getAllTrasDoctor', array('as' => 'getAllTrasDoctor', 'uses' => 'Admin\Doctor@getAllTrasDoctor'));

               // Patient
               Route::any('/allPatients', array('as' => 'allPatients', 'uses' => 'Admin\Patient@allPatients'));
               Route::any('/allInActivePatients', array('as' => 'allInActivePatients', 'uses' => 'Admin\Patient@allInActivePatients'));
               Route::any('/activatePatient/{id}', array('as' => 'activatePatient', 'uses' => 'Admin\Patient@activatePatient'));
               Route::any('/deactivatePatient/{id}', array('as' => 'deactivatePatient', 'uses' => 'Admin\Patient@deactivatePatient'));
               Route::any('/trashPatient/{id}', array('as' => 'trashPatient', 'uses' => 'Admin\Patient@trashPatient'));
               Route::any('/retrivePatient/{id}', array('as' => 'retrivePatient', 'uses' => 'Admin\Patient@retrivePatient'));
               Route::any('/deletePatient/{id}', array('as' => 'deletePatient', 'uses' => 'Admin\Patient@deletePatient'));
               Route::any('/allTrasPatients', array('as' => 'allTrasPatients', 'uses' => 'Admin\Patient@allTrasPatients'));
               Route::any('/getAllInactiveGeneralAppointment', array('as' => 'getAllInactiveGeneralAppointment', 'uses' => 'Admin\Patient@getAllInactiveGeneralAppointment'));

               // Details information for admin Panel  view modal
               Route::any('/patientDetails', array('as' => 'patientDetails', 'uses' => 'Admin\Patient@patientDetails'));
               Route::any('/doctorDetails', array('as' => 'doctorDetails', 'uses' => 'Admin\Doctor@doctorDetails'));
               Route::any('/inactiveAppointDetails', array('as' => 'inactiveAppointDetails', 'uses' => 'Admin\Patient@inactiveAppointDetails'));
               Route::any('/doctorDetailModalInGeneralAssignment', array('as' => 'doctorDetailModalInGeneralAssignment', 'uses' => 'Admin\AdminUser@doctorDetailModalInGeneralAssignment'));
           });
        });




    //==========================Front End  Route================================================//

    
    Route::any('/', array('as' => 'homePage', 'uses' => 'FrontEnd\HomeController@homePage'));
    Route::any('/joinPage',array('as' => 'joinPage', 'uses' => 'FrontEnd\HomeController@joinPage'));
    Route::any('/doctorRegDetail',array('as' => 'doctorRegDetail', 'uses' => 'FrontEnd\HomeController@doctorRegDetail')); 
    Route::any('/patientRegDetail',array('as' => 'patientRegDetail', 'uses' => 'FrontEnd\HomeController@patientRegDetail')); 

    Route::any('/signUpDoctor',array('as'=>'signUpDoctor','uses'=>'FrontEnd\HomeController@signUpDoctor'));
    Route::any('/signUpPatient',array('as'=>'signUpPatient','uses'=>'FrontEnd\HomeController@signUpPatient'));

    Route::any('/registrationSuccessMassege', array('as' => 'registrationSuccessMassege', 'uses' => 'FrontEnd\HomeController@registrationSuccessMassege'));
    Route::any('/confirmEmail/{id}', array('as' => 'confirmEmail', 'uses' => 'FrontEnd\HomeController@confirmEmail'));

    Route::any('/signIn',array('as'=>'signIn','uses'=>'FrontEnd\HomeController@signIn'));
    Route::any('/forgotPassword',array('as'=>'forgotPassword','uses'=>'FrontEnd\HomeController@forgotPassword'));
    Route::any('/forgotPasswordSendMail',array('as'=>'forgotPasswordSendMail','uses'=>'FrontEnd\HomeController@forgotPasswordSendMail'));
    Route::any('/checkEmailForPasswordReset',array('as'=>'checkEmailForPasswordReset','uses'=>'FrontEnd\HomeController@checkEmailForPasswordReset'));
    Route::any('/resetPasswordForm/{email}/{token}',array('as'=>'resetPasswordForm','uses'=>'FrontEnd\HomeController@resetPasswordForm'));
    Route::any('/resetForgotPassword',array('as'=>'resetForgotPassword','uses'=>'FrontEnd\HomeController@resetForgotPassword'));



    Route::get('/changePassword', array('as' => 'changePassword', 'uses' => 'FrontEnd\HomeController@changePassword'));
    Route::any('/changePasswordUpdate', array('as' => 'changePasswordUpdate', 'uses' => 'FrontEnd\HomeController@changePasswordUpdate'));


    // Add to database
    Route::post('/addDoctor', array('as' => 'addDoctor', 'uses' => 'Admin\Doctor@addDoctor'));
    Route::post('/addPatient',array('as'=>'addPatient','uses'=>'Admin\Patient@addPatient'));


    Route::group(['middleware' => ['auth']], function () {

        // Doctor Dashboard
        Route::group(['middleware' => ['role:doctor']], function () {

            Route::any('/doctorDashboard', array('as' => 'doctorDashboard', 'uses' => 'Admin\Doctor@doctorDashboard'));
            Route::any('/editDoctor', array('as' => 'editDoctor', 'uses' => 'Admin\Doctor@editDoctor'));
            Route::post('/updateDoctor', array('as' => 'updateDoctor', 'uses' => 'Admin\Doctor@updateDoctor'));

            Route::any('/getAppointmentNotification', array('as' => 'getAppointmentNotification', 'uses' => 'Admin\Doctor@getAppointmentNotification'));
            Route::any('/setAppointment/{id}', array('as' => 'setAppointment', 'uses' => 'Admin\Doctor@setAppointment'));
            Route::any('saveSetAppointmentData', array('as' => 'saveSetAppointmentData', 'uses' => 'Admin\Doctor@saveSetAppointmentData'));
            Route::any('/getAppointmentNotification', array('as' => 'getAppointmentNotification', 'uses' => 'Admin\Doctor@getAppointmentNotification'));
        });


        // Patient Dashboard
        Route::group(['middleware' => ['role:patient']], function () {

            Route::any('/patientDashboard', array('as' => 'patientDashboard', 'uses' => 'Admin\Patient@patientDashboard'));
            Route::any('/editPatient', array('as' => 'editPatient', 'uses' => 'Admin\Patient@editPatient'));
            Route::post('/updatePatient', array('as' => 'updatePatient', 'uses' => 'Admin\Patient@updatePatient'));

            Route::any('/searchDoctorForAppointment', array('as' => 'searchDoctorForAppointment', 'uses' => 'Admin\Patient@searchDoctorForAppointment'));
            Route::any('/makeAppointment/{id}', array('as' => 'makeAppointment', 'uses' => 'Admin\Patient@makeAppointment'));
            Route::any('saveAppointmentData', array('as' => 'saveAppointmentData', 'uses' => 'Admin\Patient@saveAppointmentData'));
            Route::any('appoinmentCreatSuccess', array('as' => 'appoinmentCreatSuccess', 'uses' => 'Admin\Patient@appoinmentCreatSuccess'));
            Route::any('allSetAppointmentResponstList', array('as' => 'allSetAppointmentResponstList', 'uses' => 'Admin\Patient@allSetAppointmentResponstList'));

            Route::any('appointmentConfirm/{id}/{email}', array('as' => 'appointmentConfirm', 'uses' => 'Admin\Patient@appointmentConfirm'));
            Route::any('appointmentDelete/{id}/{email}', array('as' => 'appointmentDelete', 'uses' => 'Admin\Patient@appointmentDelete'));
        });
    });

});


