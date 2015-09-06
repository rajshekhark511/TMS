var common = {
    'url': $('input[name=\'base_url\']').val(),
    'per_page': '10'
}

$(function () {
    $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD'});
    $('#datetimepicker2').datetimepicker({format: 'YYYY-MM-DD'});

    $('#da-slider').cslider({
        autoplay: true,
        bgincrement: 450
    });
    $("#owl-demo").owlCarousel({
        items: 4,
        lazyLoad: true,
        autoPlay: true,
        navigation: true,
        navigationText: ["", ""],
        rewindNav: false,
        scrollPerPage: false,
        pagination: false,
        paginationNumbers: false
    });


    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this),
                $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        }
        ;
    }

    var accordion = new Accordion($('#accordion'), false);


    // Get batches of selected standard
    $('select[name=\'standard\']').live('change', function () {
        $.ajax({
            url: common.url + '/common/batches/' + this.value,
            dataType: 'json',
            beforeSend: function () {
                $('select[name=\'standard\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function () {
                $('.wait').remove();
            },
            success: function (json) {
                html = '<option value="">[--Select--]</option>';
                if (json['batches'] != '') {
                    for (i = 0; i < json['batches'].length; i++) {
                        html += '<option value="' + json['batches'][i]['batch_id'] + '">';
                        html += '' + json['batches'][i]['batch_name'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">[--No Batches--]</option>';
                }
                $('select[name=\'batch\']').html(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Get sub form - depend on user type 
    $('button[name=\'btnShowDates\']').live('click', function () {
        $.ajax({
            url: common.url + '/tution/get_students_for_attendance',
            dataType: 'html',
            beforeSend: function () {
                $('select[name=\'user_type\']').after('<span class="wait">&nbsp;<i class="fa fa-refresh fa-spin">&nbsp;</i></span>');
            },
            complete: function () {
                $('.wait').remove();
            },
            success: function (html) {
                $('#Sub_Form').after(html);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
    
    //Fedback form validation
    $('#feedbackFrm').validate({
        errorElement:'span',
        errorClass:'text-danger',
        validClass: "has-success",
        rules:{
            userName:'required',
            email:{
                required:true,
                email:true
            },
            subject:'required'
        },
        messages:{
            userName:'Please enter user name.',
            email:{
                required:'Please enter email',
                email:'Please enter valid email'
            },
            subject:'Please enter subject'
        }
    });

});
