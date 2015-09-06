<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



</div>
<div class="col-md-9">

    <div id="div-1" class="accordion-body body in" style="height: auto;">
        <?php echo $this->session->flashdata('error'); ?>
        <?php echo $this->session->flashdata('success'); ?>
        <form class="form-horizontal" role="form">
            <div class="row">
                <div class="form-group col-lg-4 col">
                    <label>From Date</label>
                    <div class="input-group date" id="datetimepicker1">
                        <input  type="text" class="form-control" name="fromdate" id="fromdate" value="" readonly="readonly"/>
                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                        <?php echo form_error('fromdate', '<div class="text-danger">', '</div>'); ?>
                    </div>                                            
                </div>
                <div class="form-group col-lg-4 col">
                    <label>From Date</label>
                    <div class="input-group date" id="datetimepicker2">
                        <input  type="text" class="form-control" name="todate" id="todate" value="" readonly="readonly"/>
                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                        <?php echo form_error('todate', '<div class="text-danger">', '</div>'); ?>
                    </div>                                            
                </div>
                <div class="form-group col-lg-2">              
                      <label></label>
                    <div class="input-group">
                       <button type="submit" name="btnShowDates" class="btn btn-default" id="btnShowDates">Show</button>
                    </div>                     
                </div>
            </div>                      
        </form>
    </div>
</div>


</div>
</div>
</div>
</div>