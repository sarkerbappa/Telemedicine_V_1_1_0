@extends('front_end.templates.dashboard')
@section('content')
    <style>

        tfoot {
            display: table-header-group;
        }
    </style>

    <div class="inner_body_content_wrapper" id="choose_doctor">

        <div class="row">
            <div class="col-xs-8">
                <h2>
                    <i class="fa fa-search"></i> All Doctor's Responses
                </h2>
            </div>
            <div class="col-xs-4">

            </div>
        </div>
        <div class="row">
            <?php if(Session::get('success_massege')) { ?>
            <div class="col-xs-6 col-xs-offset-3">
                <div class="alert alert-success fade in wow fadeInUp animated">
                    <a href="" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo Session::get('success_massege'); ?>
                </div>
            </div>
            <?php }?>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-xs-12  wow fadeIn animated">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Advise</th>
                        <th>Actione</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php
                    if(isset($all_respons_list))
                    foreach($all_respons_list as  $single_doctor_respons){?>

                    <tr>
                        <td><?php
                            if($single_doctor_respons->image === ''){?>
                            <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                 width="100" alt="User Image">
                            <?php }else{?>
                            <img src="<?php echo URL::to('public/uploads/profile/' . $single_doctor_respons->image);?>"
                                 height="70" width="100" alt="User Image">
                            <?php }?></td>
                        <td><?php echo $single_doctor_respons->f_name . ' ' . $single_doctor_respons->l_name?></td>
                        <td><?php echo $single_doctor_respons->doctor_time;?></td>
                        <td><?php echo $single_doctor_respons->doctor_advise;?></td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary ">Action</button>
                                <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo URL::action('Admin\Patient@appointmentConfirm', [$single_doctor_respons->appoint_id, $single_doctor_respons->email]) ?>"><i
                                                    class="fa fa-check"></i>Confirm</a></li>
                                    <li>
                                        <a href="<?php echo URL::action('Admin\Patient@appointmentDelete', [$single_doctor_respons->appoint_id, $single_doctor_respons->email]) ?>"><i
                                                    class="fa fa-trash-o"></i>Delete</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Advise</th>
                        <th>Actione</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
