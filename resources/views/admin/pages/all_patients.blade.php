@extends('admin.templates.default')
@section('content')
    <section class="content-header">
        <h1>
            All Patients

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User Management</a></li>
            <li class="active">All Patients</li>
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
                            if(isset($all_patients))
                            foreach($all_patients as  $single_patients){?>
                            <tr>
                                <td><?php echo $single_patients->f_name . ' ' . $single_patients->l_name ?></td>

                                <td>
                                    <?php
                                    if($single_patients->image === ''){?>
                                    <img src="<?php echo URL::to('public/uploads/profile/empty.png');?>" height="70"
                                         width="100" alt="User Image">
                                    <?php }else{?>
                                    <img src="<?php echo URL::to('public/uploads/profile/' . $single_patients->image);?>"
                                         height="70" width="100" alt="User Image">
                                    <?php }?>
                                </td>


                                <td><?php echo $single_patients->bloodgroup;?></td>
                                <td><?php echo $single_patients->mobile;?></td>
                                <td>
                                    <div class="btn-group">
                                        <?php
                                        $status = $single_patients->status === 1 ? 'Active' : 'Inactive';
                                        echo '<span class =' . $status . '>' . $status . '</span>';
                                        ?>
                                    </div>
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary ">Action</button>
                                        <button type="button" class="btn btn-primary  dropdown-toggle"
                                                data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href ="" data-toggle="modal" class="patientDetails" data-target="#patientDetailModal" class=" user_details" id="<?php echo $single_patients->id ?>"><i class="fa fa-eye"></i> View</a></li>
                                            <li>
                                                <a href="<?php echo $single_patients->status === 1 ? URL::action('Admin\Patient@deactivatePatient', [$single_patients->id]) : URL::action('Admin\Patient@activatePatient', [$single_patients->id]) ?>">  <i class="fa fa-angle-<?php echo $single_patients->status ===1?'down':'up' ?>"></i> <?php echo $single_patients->status === 1 ? 'Deactivate' : 'Activate'; ?></a>
                                            </li>
                                            <li><a href="<?php echo URL::action('Admin\Patient@trashPatient', [$single_patients->id]) ?>"><i class="fa fa-trash-o"></i>Trash  </a></li>

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


        <!-- Modal -->
        <div id="patientDetailModal" class="modal fade" role="dialog">
        </div>

    </section><!-- /.content -->



@stop




