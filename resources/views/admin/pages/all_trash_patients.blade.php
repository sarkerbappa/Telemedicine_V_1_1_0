@extends('admin.templates.default')
@section('content')
    <section class="content-header">
        <h1>
            All Trashed Patient

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User Management</a></li>
            <li class="active">All Trashed Patient</li>
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
                                <th>Image</th>
                                <th>Blood Group</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(isset($all_trash_patients))
                            foreach($all_trash_patients as  $single_patient){?>
                            <tr>
                                <td>
                                    <?php
                                    if($single_patient->image === ''){?>
                                    <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                         width="100" alt="User Image">
                                    <?php }else{?>
                                    <img src="<?php echo URL::to('public/uploads/profile/' . $single_patient->image);?>"
                                         height="70" width="100" alt="User Image">
                                    <?php }?>
                                </td>
                                <td><?php echo $single_patient->f_name.' '.$single_patient->l_name?></td>
                                <td><?php echo $single_patient->bloodgroup;?></td>
                                <td><?php echo $single_patient->mobile;?></td>
                                <td><span class="Inactive"><?php echo "Trashd"?></span></td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary ">Action</button>
                                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php echo URL::action('Admin\Patient@retrivePatient', [$single_patient->id]) ?>">  <i class="fa fa-angle-up"></i>Retrive</a></li>
                                            <li><a href="<?php echo URL::action('Admin\Patient@deletePatient', [$single_patient->id]) ?>"><i class="fa fa-trash-o"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Blood Group</th>
                                <th>Mobile</th>
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