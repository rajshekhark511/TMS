
<!--  /Login form -->


<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script src="<?php echo base_url('js/admin/moment.js');?>"></script>
<script src="<?php echo base_url('js/admin/bootstrap-datetimepicker.js');?>"></script>
<script src="<?php echo base_url('js/admin/jquery.form.js');?>"></script>
<script type="text/javascript">
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->
</body>
</html>