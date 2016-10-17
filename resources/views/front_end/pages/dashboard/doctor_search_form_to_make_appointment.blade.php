@extends('front_end.templates.dashboard')
@section('content')
<style>

    tfoot {
        display: table-header-group;
    }
</style>

    <div class="inner_body_content_wrapper" id="choose_doctor">

        <div class="row" >
            <div class="col-xs-5">
                <h2>
                    <i class="fa fa-search"></i>  Choose Doctor
                </h2>
            </div>
            <div class="col-xs-6">

            </div>
        </div>
        <div class="row" >
            <?php if(Session::get('edit_success_success')) { ?>
            <div class="col-xs-6 col-xs-offset-3">
                <div class="alert alert-success fade in wow fadeInUp animated">
                    <a href="" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo Session::get('edit_success_success'); ?>
                </div>
            </div>
            <?php }?>
        </div>
        <hr>
        <div class="row">
            <div  class="col-md-12 col-xs-12  wow fadeIn animated">
                  <table id="example" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th></th>
                          <th></th>
                          <th>Present Job Institute</th>
                          <th> </th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>


                      <?php
                      if(isset($all_doctor))
                      foreach($all_doctor as  $single_doctor){?>
                      <tr>
                          <td><?php
                              if($single_doctor->image === ''){?>
                              <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                   width="100" alt="User Image">
                              <?php }else{?>
                              <img src="<?php echo URL::to('public/uploads/profile/' . $single_doctor->image);?>"
                                   height="70" width="100" alt="User Image">
                              <?php }?></td>
                          <td><?php echo $single_doctor->f_name.' '.$single_doctor->l_name?></td>
                          <td><?php echo $single_doctor->medical_speciality;?></td>
                          <td><?php echo $single_doctor->p_job;?></td>

                          <td>
                              <div class="doctor_select_action">
                                  <a href="<?php echo URL::action('Admin\Patient@makeAppointment', [$single_doctor->id]) ?>"> <i class="fa fa-hand-pointer-o"></i>
                                      Select </a>
                              </div>
                          </td>
                      </tr>
                      <?php }?>
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>Image</th>
                          <th> Name</th>
                          <th>Speciality</th>
                          <th>Present Job Institute</th>
                          <th>Action</th>
                      </tr>
                      </tfoot>
                  </table>
            </div>
        </div>
    </div>
@stop
