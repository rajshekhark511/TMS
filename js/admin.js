/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var d = new Date();
var common={
    'url':$('input[name=\'base_url\']').val(),
    'per_page':'10',
    'year':d.getFullYear()
}

$(function(){
   $('#frmAdminUser').validate({
        errorElement:'div',
        errorClass:'text-danger',
        rules:{
            user_fname:'required',
            user_mname:'required',
            user_lname:'required',
            user_gender:'required',
            //user_password:'required',
            user_mobile:'required',
            user_type:'required',
            user_email:{
                required:true,
                email:true
            },
            //Teachers field validation
            th_dob:'required',
            th_blood_group:'required',
            th_address:'required',
            th_marital_status:'required',
            th_state:'required',
            th_district:'required',
            th_city:'required',
            th_pincode:'required',
            
            // Students fields validations
            st_dob:'required',
            st_birthplace:'required',
            st_admissionno:'required',
            st_branch:'required',
            st_class:'required',
            st_batch:'required',
            st_address:'required',
            st_state:'required',
            st_district:'required',
            st_city:'required',
            st_pincode:'required'
            
        },
        messages:{
            user_fname:'First name field is required',
            user_mname:'Middle name field is required',
            user_lname:'Last name field is required',
            user_gender:'Gender field is required',
            //user_password:'Password field is required',
            user_mobile:'Mobile field is required',
            user_type:'Please select user type',
            user_email:{
                required:'Email field is required.',
                email:'Please enter valid email'
            },
            //Teachers field validation
            th_dob:'DOB field is required',
            th_blood_group:'Blood group field is required',
            th_address:'Address field is required',
            th_marital_status:'Marital status field is required',
            th_state:'State field is required',
            th_district:'District field is required',
            th_city:'City field is required',
            th_pincode:'Pincode field is required',
            
            // Students fields validations
            st_dob:'DOB field is required',
            st_birthplace:'Birthplace field is required',
            st_admissionno:'Admission number field is required',
            st_branch:'Branch field is required',
            st_class:'Standard field is required',
            st_batch:'Batch field is required',
            st_address:'Address field is required',
            st_state:'State field is required',
            st_district:'District field is required',
            st_city:'City field is required',
            st_pincode:'Pincode field is required'
        }
    }); 
    
    // Get All District - onchange event of State
    $('select[name=\'th_state\']').live('change',function(){
        $.ajax({
            url: common.url+'/common/district/' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'th_state\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
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
                $('select[name=\'th_district\']').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });    
                    
    // Get sub form - depend on user type 
    $('select[name=\'user_type\']').live('change',function(){
        $.ajax({
            url: common.url+'/admin/register_next_form/' + this.value,
            dataType: 'html',
            beforeSend: function() {
                $('select[name=\'user_type\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(html) {
                $('#Sub_Form').after(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
    
    
    // Get All standards - onchange event of branch
    $('select[name=\'st_branch\']').live('change',function(){
        $.ajax({
            url: common.url+'/common/standard/' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'st_branch\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                html = '<option value="">[--Select--]</option>';
                if (json['standards'] != '') {
                    //alert(json['standards'].length);
                    for (i = 0; i < json['standards'].length; i++) {
                        html += '<option value="' + json['standards'][i]['std_id'] + '">';
                        html += '' + json['standards'][i]['std_name'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">[--No Standards--]</option>';
                }
                $('select[name=\'st_class\']').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        
    });
    
    
    // Get All batches - onchange event of standard
    $('select[name=\'st_class\']').live('change',function(){
        $.ajax({
            url: common.url+'/common/batches/' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'st_class\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function() {
                $('.wait').remove();
            },
            success: function(json) {
                html = '<option value="">[--Select--]</option>';
                if (json['batches'] != '') {
                    //alert(json['batches'].length);
                    for (i = 0; i < json['batches'].length; i++) {
                        //alert( json['batches'][i]['batch_name']);
                        html += '<option value="' + json['batches'][i]['batch_id'] + '">';
                        html += '' + json['batches'][i]['batch_name'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">[--No Batches--]</option>';
                }
                $('select[name=\'st_batch\']').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
    
    $(document).on('click','a.addDate',function(){
        var count = $('.holidayDate').length;  
        var html = '';
            html += '<tbody>';
            html += '<tr>';
            html += '<td align="right"><b>Date: </b></td>';
            html += '<td>';
            html += '<div class="input-group holidayDate">';
            html += '<input type="text" class="date form-control holidayDate-text" name="date[]" value="" id="holidayDate-text'+count+'" readonly="readonly"/>';
            html += '<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>';                                                        
            html += '</div>';
            html += '</td>';
            html += '<td>';
            html += '<a class="removeDate" href="javascript:;">';
            html += '<i class="fa fa-trash-o fa-fw"></i>';
            html += '</a>';
            html += '</td>';
            html += '</tr>';
            html += '</tbody>';
            $('#dateData > tfoot').before(html);
            $('.holidayDate').datetimepicker({format: 'YYYY-MM-DD',minDate: moment({y: common.year}),maxDate: moment().add(1, 'y'),pickTime:false});
       });
       $(document).on('click','a.removeDate',function(){
           $(this).closest('tbody').remove();
       });
       $('.holidayDate').datetimepicker({format: 'YYYY-MM-DD',minDate: moment({y: common.year}),maxDate: moment().add(1, 'y'),pickTime:false});
       
        $('#holidayFrm').validate({
            errorElement:'div',
            errorClass:'text-danger',            
            errorPlacement: function (error, element) {  alert("vip");
               if ($(element).hasClass('holidayDate-text')) {                
                    $(element).parent('div').after(error);
               } else {
                   error.insertAfter(element);
               }
           }
        });
       $(document).on('click','#btn-add-holiday',function(){
           $.each($('.holidayDate-text'),function(key,value){
               $('#'+$(value).attr('id')).rules( "add", {
                    required: true,                    
                    messages: {
                        required: "Required input"                    
                    }
                });
           });
           if($('#holidayFrm').validate()) { 
               return true;
            } else {
               return false;
            }
            return false;
       });
});


function deleteAdminSubUser(id,usertype){
    var confirmed = window.confirm("Are you sure want to delete this?");
    if(confirmed){
        $.ajax({
            url: common.url+'/admin/delete_user/' + id + '/' + usertype,
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



