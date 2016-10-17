/**
 * Created by Bappa on 3/2/2016.
 */


jQuery(document).ready(function($){


    // Smooth animation to Notification
    //$(".dropdown").click(function(){
    //    $(this).find(".dropdown-menu").slideToggle("slow");
    //});

    $(".btn-group ").click(function(){
        $(this).find(".dropdown-menu").slideToggle();
    });

   // Ajax Setting
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $('.patientDetails').click(function(){
        event.preventDefault()
        var this_id = $(this).attr("id");
        var baseurl = window.location.origin;
        $.ajax({
            type: "POST",
            url : 'patientDetails',
            data : {'id':this_id},
            success : function(data){
                var txt1;
                txt1  = '<div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> ';
                txt1 += '<div class="row"><div class="col-xs-6"> <h1 class="modal-title">'+data[0]['f_name'] + ' '+ data[0]['l_name']+'</h1>';
                txt1 += '<p>'+' Registered as a ' +data[0]['role']  +'.</p> </div>';
                txt1 += ' <div class="col-xs-6"> <img src="'+baseurl+'/telemedicine/public/uploads/profile/'+ data[0]['image']+'" alt="Image" class="pull-right" height="100" width="120"/></div></div>';
                txt1 += '</div> <div class="modal-body">';

                txt1 += '<p>'+'<b> Gender: </b>'+data[0]['gender'] +'</p>';
                txt1 += '<p>'+'<b> Blood Group: </b>' +data[0]['bloodgroup']  +'</p>';
                txt1 += '<p>'+'<b> National ID No: </b>'+data[0]['nidno'] +'</p>';
                txt1 += '<p>'+'<b> About: </b>' +data[0]['about']  +'</p>';
                txt1 += '<p>'+'<b> Mobile: </b>'+data[0]['mobile'] +'</p>';
                txt1 += '<p>'+'<b> Email: </b>' +data[0]['email']  +'</p>';

                txt1 +='</div>';
                txt1 += '<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div> </div> </div>';

                $("#patientDetailModal").html(txt1);


            },
            error:function(){
                alert("failure");
            }
        });
    });


/// Doctor's Part
    $('.doctorDetailModal').click(function(){
        event.preventDefault()

        var this_id = $(this).attr("id");
        var baseurl = window.location.origin;
        $.ajax({
            type: "POST",
            url : 'doctorDetails',
            data : {'id':this_id},
            success : function(data){
                var txt1;
                txt1  = '<div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> ';
                txt1 += '<div class="row"><div class="col-xs-6"> <h1 class="modal-title">'+data[0]['f_name'] + ' '+ data[0]['l_name']+'</h1>';
                txt1 += '<p>'+' Registered as a ' +data[0]['role']  +'.</p> </div>';
                txt1 += ' <div class="col-xs-6"> <img src="'+baseurl+'/telemedicine/public/uploads/profile/'+ data[0]['image']+'" alt="Image" class="pull-right" height="100" width="120"/></div></div>';
                txt1 += '</div> <div class="modal-body">';

                txt1 += '<p>'+'<b> Gender: </b>'+data[0]['gender'] +'</p>';
                txt1 += '<p>'+'<b> Blood Group: </b>' +data[0]['bloodgroup']  +'</p>';
                txt1 += '<p>'+'<b>  User Type: </b>' +data[0]['role']  +'</p>';
                txt1 += '<p>'+'<b> National ID No: </b>'+data[0]['nidno'] +'</p>';
                txt1 += '<p>'+'<b> About: </b>' +data[0]['about']  +'</p>';
                txt1 += '<p>'+'<b> Mobile: </b>'+data[0]['mobile'] +'</p>';
                txt1 += '<p>'+'<b> Email: </b>' +data[0]['email']  +'</p>';

                txt1 +='</div>';
                txt1 += '<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div> </div> </div>';

                $("#doctorDetailModal").html(txt1);


            },
            error:function(){
                alert("failure");
            }
        });
    });


/// Appointment Notification
    $('.inactiveAppointDetails').click(function(){
        event.preventDefault()

        var this_id = $(this).attr("id");
        var baseurl = window.location.origin;
        $.ajax({
            type: "POST",
            url : 'inactiveAppointDetails',
            data : {'id':this_id},
            success : function(data){
                var txt1;
                txt1  = '<div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> ';
                txt1 += '<div class="row"><div class="col-xs-6"> <h1 class="modal-title">'+data[0]['f_name'] + ' '+ data[0]['l_name']+'</h1>';
                txt1 += '<p>'+'' +'' +'.</p> </div>';
                txt1 += ' <div class="col-xs-6"> <img src="'+baseurl+'/telemedicine/public/uploads/profile/'+ data[0]['image']+'" alt="Image" class="pull-right" height="100" width="120"/></div></div>';
                txt1 += '</div> <div class="modal-body">';
                txt1 += '<p>'+'<b> Gender: </b>'+data[0]['gender'] +'</p>';
                txt1 += '<p>'+'<b> Blood Group: </b>' +data[0]['bloodgroup']  +'</p>';
                txt1 += '<p>'+'<b> About: </b>' +data[0]['about']  +'</p>';
                txt1 += '<p>'+'<b> Mobile: </b>'+data[0]['mobile'] +'</p>';
                txt1 += '<p>'+'<b> Email: </b>' +data[0]['email']  +'</p>';
                txt1 += '<p>'+'<b> Communication Type: </b>' +data[0]['communication_type']  +'</p>';
                txt1 += '<p>'+'<b> Appointment Creation Time: </b>' +data[0]['created_at']  +'</p>';
                txt1 += '<p>'+'<b> Problem: </b>' +data[0]['problem']  +'</p>';
                txt1 += '<p>'+'<b> Convenient Time: </b>' +data[0]['patient_time']  +'</p>';
                txt1 +='</div>';
                txt1 += '<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div> </div> </div>';

                $("#inactiveAppointmentDetailModal").html(txt1);


            },
            error:function(){
                alert("failure");
            }
        });
    });

    /// Doctor's Part in search doctor for General Assignment
    $('.doctorDetailModalInGeneralAssignment').click(function(){
        event.preventDefault()

        var this_id = $(this).attr("id");
        var baseurl = window.location.origin;
        $.ajax({
            type: "POST",
            url : baseurl +'/'+'telemedicine/doctorDetailModalInGeneralAssignment',
            data : {'id':this_id},
            success : function(data){
                console.log(data);
                var txt1;
                txt1  = '<div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> ';
                txt1 += '<div class="row"><div class="col-xs-6"> <h1 class="modal-title">'+data[0]['f_name'] + ' '+ data[0]['l_name']+'</h1>';
                txt1 += '<p>'+' Registered as a ' +data[0]['role']  +'.</p> </div>';
                txt1 += ' <div class="col-xs-6"> <img src="'+baseurl+'/telemedicine/public/uploads/profile/'+ data[0]['image']+'" alt="Image" class="pull-right" height="100" width="120"/></div></div>';
                txt1 += '</div> <div class="modal-body">';

                txt1 += '<p>'+'<b> Gender: </b>'+data[0]['gender'] +'</p>';
                txt1 += '<p>'+'<b> Blood Group: </b>' +data[0]['bloodgroup']  +'</p>';
                txt1 += '<p>'+'<b> User Type: </b>' +data[0]['role']  +'</p>';
                txt1 += '<p>'+'<b> National ID No: </b>'+data[0]['nidno'] +'</p>';
                txt1 += '<p>'+'<b> About: </b>' +data[0]['about']  +'</p>';
                txt1 += '<p>'+'<b> Mobile: </b>'+data[0]['mobile'] +'</p>';
                txt1 += '<p>'+'<b> Email: </b>' +data[0]['email']  +'</p>';

                txt1 +='</div>';
                txt1 += '<div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div> </div> </div>';

                $("#doctorDetailModalInGeneralAssignment").html(txt1);


            },
            error:function(){
                alert("failure");
            }
        });
    });


});
