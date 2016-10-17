<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Get All Inactive Users for Notification
        $inactive_users = User:: getAllinactiveUsers();
        view()->share('inactive_users',$inactive_users );


        // Get All General Appointment notification
        $all_general_appointment_notification = User::getGeneralAppointmentNotification();
        view()->share('all_general_appointment_notification',$all_general_appointment_notification );

        // Get Admin Email Address for all email sending option



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
