@extends('admin.templates.default')
@section('content')
    <section class="content-header">
        <h1>
            All Doctors

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User Management</a></li>
            <li class="active">All Doctors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <?php if(Session::get('activetion_success')) { ?>
                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="alert alert-success fade in">
                                    <a href="" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Success!</strong> <?php echo Session::get('activetion_success'); ?>
                                </div>
                            </div>
                            <?php }elseif (Session::get('deactivetion_success')){?>
                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="alert alert-success fade in ">
                                    <a href="" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Success!</strong> <?php echo Session::get('deactivetion_success'); ?>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Medical Reg No</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(isset($all_trash_doctors))
                            foreach($all_trash_doctors as  $single_doctor){?>
                            <tr>
                                <td><?php echo $single_doctor->f_name.' '.$single_doctor->l_name?></td>
                                <td><?php echo $single_doctor->medical_speciality;?></td>
                                <td><?php echo $single_doctor->medical_reg_no;?></td>
                                <td><?php echo $single_doctor->mobile;?></td>
                                <td><?php echo "Trashd"?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary ">Action</button>
                                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php echo URL::action('Admin\Doctor@retriveDoctor', [$single_doctor->id]) ?>">  <i class="fa fa-angle-up"></i>Retrive</a></li>
                                            <li><a href="<?php echo URL::action('Admin\Doctor@deleteDoctor', [$single_doctor->id]) ?>"><i class="fa fa-trash-o"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Medical Reg No</th>
                                <th>Mobile No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Modal-->
        <div id="doctorDetailModal" class="modal fade" role="dialog">
        </div>
    </section><!-- /.content -->
@stop