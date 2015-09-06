/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var common={
    'url':$('input[name=\'base_url\']').val(),
    'per_page':'10'
};

$(function(){
    if($('#dataTable').length>0){
        metisTable();
    }
    //metisSortable();

    $('#frmSignIn').validate({
        errorElement:'div',
        errorClass:'text-error',
        rules:{
            user_email:{
                required:true,
                email:true
            },
            user_password:'required'
        },
        messages:{
            user_email:{
                required:'Username required',
                email:'Invalid email'
            },
            user_password:'Password required'
        }
    });
            
    $('#frmInstitute').validate({
        errorElement:'div',
        errorClass:'text-danger',
        rules:{
            inst_name:'required',
            inst_phone:'required',
            inst_address1:'required',
            inst_state:'required',
            inst_dustrict:'required',
            inst_city:'required',
            inst_email:{
                required:true,
                email:true
            }
        },
        messages:{
            inst_name:'The Institute Name field is required.',
            inst_phone:'The Institute Phone field is required.',
            inst_address1:'The Institute Address1 field is required.',
            inst_state:'Please select state',
            inst_district:'Please select district',
            inst_city:'Please select city',
            inst_email:{
                required:'The Institute Email field is required.',
                email:'Please enter valid email'
            }
        }
    });
    $('#frmBranch').validate({
        errorElement:'div',
        errorClass:'text-danger',
        validClass: "has-success",
        rules:{
            br_name:'required',
            br_phone:'required',
            br_address_1:'required',
            br_state:'required',
            br_district:'required',
            br_city:'required'
        },
        messages:{
            br_name:'The Institute Name field is required.',
            br_phone:'The Institute Phone field is required.',
            br_address_1:'The Institute Address1 field is required.',
            br_state:'Please select state',
            br_district:'Please select district',
            br_city:'Please select city'
        }
    });
    $('#frmStandard').validate({
        errorElement:'div',
        errorClass:'text-danger',
        validClass: "has-success",
        rules:{
            br_id:'required',
            std_name:'required'
        },
        messages:{
            br_id:'The branch Name is required.',
            std_name:'The standard name is required.'
        }
    });
    $('#frmSubject').validate({
        errorElement:'div',
        errorClass:'text-danger',
        validClass: "has-success",
        rules:{
            br_id:'required',
            std_id:'required',
            subject:'required'
        },
        messages:{
            br_id:'The branch Name is required.',
            std_id:'The standard is required.',
            subject:'The subject name is required.'
        }
    });

    // Get All District - onchange event of State
    $('select[name=\'inst_state\']').live('change',function(){
        $.ajax({
            url: common.url+'/common/district/' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'inst_state\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                html = '<option value="">[--Select--]</option>';
                if (json['district'] != '') {
                    for (i = 0; i < json['district'].length; i++) {
                        html += '<option value="' + json['district'][i]['d_id'] + '">';
                        html += '' + json['district'][i]['d_name'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">[--No District--]</option>';
                }
                $('select[name=\'inst_district\']').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Get All cities - onchange event of district
    /* $('select[name=\'inst_district\']').live('change',function(){
        $.ajax({
            url: common.url+'/common/city/' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'inst_state\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                html = '<option value="">[--Select--]</option>';
                if (json['city'] != '') {
                    for (i = 0; i < json['city'].length; i++) {
                        html += '<option value="' + json['city'][i]['ct_id'] + '">';
                        html += '' + json['city'][i]['city'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">[--No City--]</option>';
                }
                $('select[name=\'inst_city\']').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });*/

    $('#frmUser').validate({
        errorElement:'div',
        errorClass:'text-danger',
        rules:{
            institute_id:'required',
            user_fname:'required',
            user_mname:'required',
            user_lname:'required',
            user_password:'required',
            user_mobile:'required',
            user_type:'required',
            user_email:{
                required:true,
                email:true
            }
        },
        messages:{
            institute_id:'Please select institute',
            user_fname:'First name field is required',
            user_mname:'Middle name field is required',
            user_lname:'Last name field is required',
            user_password:'Password field is required',
            user_mobile:'Mobile field is required',
            user_type:'Please select user type',
            user_email:{
                required:'Email field is required.',
                email:'Please enter valid email'
            }
        }
    });
    
    //Datepicker
    $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
    $('#datetimepicker2').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
    $('#addEvent').validate({
        errorElement:'div',
        errorClass:'text-danger',
        validClass: "has-success",
        rules:{
            post_title:'required',
            post_content:'required',
            post_start_date:'required',
            post_end_date:'required'
        },
        messages:{
            post_title:'Please enter title',
            post_content:'Please enter content',
            post_start_date:'Please enter start date',
            post_end_date:'Please enter end date'
        },
         errorPlacement: function (error, element) { 
            if ($(element).attr('id')==='post_start_date' || $(element).attr('id')==='post_end_date') {                
                 $(element).parent('div').after(error);
            } else {
                error.insertAfter(element);
            }
        }
    });
    
    
    
});

function deleteInstitute(id){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/super_admin/delete_institute/' + id,
            dataType: 'json',
            beforeSend: function() {
                $('header h5').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                if(json.success==true){
                    $('tbody#institute'+id).remove();
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }else{
        return false;
    }
    return false;
}

function deleteUser(id){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/super_admin/delete_user/' + id,
            dataType: 'json',
            beforeSend: function() {
                $('header h5').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                if(json.success==true){
                    $('tbody#user'+id).remove();
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }else{
        return false;
    }
    return false;
}

function deleteBranch(id){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/admin/delete_branch/' + id,
            dataType: 'json',
            beforeSend: function() {
                $('header h5').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                if(json.success==true){
                    $('tbody#branches'+id).remove();
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }else{
        return false;
    }
    return false;
}

function deleteStandard(id){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/admin/delete_standard/' + id,
            dataType: 'json',
            beforeSend: function() {
                $('header h5').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                if(json.success==true){
                    $('tbody#standards'+id).remove();
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }else{
        return false;
    }
    return false;
}

function deleteSubject(id){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/admin/delete_subject/' + id,
            dataType: 'json',
            beforeSend: function() {
                $('header h5').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                if(json.success===true){
                    $('tbody#subjects'+id).remove();
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }else{
        return false;
    }
    return false;
}

function deleteEvent(id,type){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/admin/delete_event/' + id+'/'+type,
            dataType: 'json',
            beforeSend: function() {
                $('header h5').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                if(json.success===true){
                    $('tbody#events'+id).remove();
                    return true;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }else{
        return false;
    }
    return false;
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$(document).on('click', 'input[name=\'select-all\']', function(e){
    if($(this).is(':checked')){
        $('input[name*=\'checkbox\']').prop('checked',true);
    }else{
        $('input[name*=\'checkbox\']').prop('checked',false);
    }
});
$(document).on('click', 'input[name*=\'checkbox\']', function(e){
    var checked=$('input[name*=\'checkbox\']:checked').length;
    var total=$('input[name*=\'checkbox\']').length;
    if(total==checked)
        $('input[name=\'select-all\']').prop('checked',true);
    else
        $('input[name=\'select-all\']').prop('checked',false);
});

$('#frmSubject select[name=\'br_id\']').live('change',function(){
        $.ajax({
            url: common.url+'/admin/get_subject/' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('#frmSubject select[name=\'br_id\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                html = '<option value="">[--Select standard--]</option>';
                if (json['standards'] != '') {
                    for (i = 0; i < json['standards'].length; i++) {
                        html += '<option value="' + json['standards'][i]['std_id'] + '">';
                        html += '' + json['standards'][i]['std_name'] + '</option>';
                    }
                } else {
                    html += '<option value="" selected="selected">[--No standards--]</option>';
                }
                $('#frmSubject select[name=\'std_id\']').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });


//Ajax file upload code
$(document).ready(function(){
var options = {
    beforeSend: function()
    {
    	$("#progress").show();
    	//clear everything
    	$("#bar").width('0%');
    	$("#message").html("");
		$("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete)
    {
    	$("#bar").width(percentComplete+'%');
    	$("#percent").html(percentComplete+'%');


    },
    success: function()
    {
        //$("#bar").width('100%');
    	//$("#percent").html('100%');

    },
	complete: function(response)
	{
		$('#btn-change-profile').css('display','none');
                var data=$.parseJSON($.trim(response.responseText));
                if($.trim(data['error'])!=''){

                }else if($.trim(data['file'])!=''){
                    $('#profile-photo').attr('src',data['file']);
                }
                //$("#message").html("<font color='green'>"+response.responseText+"</font>");
	},
	error: function()
	{
		$("#message").html("<font color='red'> ERROR: unable to upload files</font>");

	}

}; 


$("#frm-prf-photo").ajaxForm(options);
});

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

function submit_profile_form(){        
    //$('#frm-prf-photo')[0].submit();
    $('#btn-change-profile').css('display','block');
}