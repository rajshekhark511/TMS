<div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-horizontal">
                    <div class="row main-continer">
                        <label class="clsLabel">Branch</label>
                        <?php echo form_dropdown('branch', $branches, ($branchId),'id="branch" class="form-control selctmarg" disabled'); ?>
                        
                        <label class="clsLabel">Standard</label>
                        <?php echo form_dropdown('standard', $standard, '','id="standard" class="form-control selctmarg"'); ?>
                        
                        <label class="clsLabel">Batch</label>
                        <select class="form-control selctmarg" name="batch" id="batch">
                            <option value="">[--Select--]</option>
                        </select>
                    </div>                                        
                </div>    
                <ul id="accordion" class="accordion">
                    <li>
                        <div class="link"><i class="fa fa-database"></i>Monthly Attendance<i class="fa fa-chevron-down"></i></div>
                        <ul class="submenu">
                            <li><a href="<?php echo site_url("tution/addmonthly"); ?>">Add</a></li>
                            <li><a href="#">View</a></li>
                            <li><a href="#">Update</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="link"><i class="fa fa-code"></i>Attendance Report<i class="fa fa-chevron-down"></i></div>
                        <ul class="submenu">
                            <li><a href="#">Monthly</a></li>
                            <li><a href="#">Weekly</a></li>
                            <li><a href="#">Periodically</a></li>
                        </ul>
                    </li>
                    
                </ul>