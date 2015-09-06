<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<header class="subtitle">
    <h5>Parent Information</h5>
</header>
<br/>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Child Name</label>
            <?php echo form_dropdown('studentid', $students, (isset($parent['studentid']) ? $parent['studentid'] : ''),'id=studentid class=form-control'); ?>
            <?php echo form_error('studentid', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Father Name</label>
            <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo set_value('father_name', (isset($parent['father_name']) ? $parent['father_name'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Father Email</label>
            <input type="email" class="form-control" name="father_email" id="father_email" value="<?php echo set_value('father_email', (isset($parent['father_email']) ? $parent['father_email'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Father Mobile</label>
            <input type="text" class="form-control" name="father_mobile" id="father_mobile" value="<?php echo set_value('father_mobile', (isset($parent['father_mobile']) ? $parent['father_mobile'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
   
</div>
<div class="row">
     <div class="col-lg-6">
        <div class="form-group">
            <label>Father Occupation</label>
            <input type="text" class="form-control" name="father_occupation" id="father_occupation" value="<?php echo set_value('father_occupation', (isset($parent['father_occupation']) ? $parent['father_occupation'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Father Education</label>
            <input type="text" class="form-control" name="father_education" id="father_education" value="<?php echo set_value('father_education', (isset($parent['father_education']) ? $parent['father_education'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Mother Name</label>
            <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?php echo set_value('mother_name', (isset($parent['mother_name']) ? $parent['mother_name'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Mother Email</label>
            <input type="email" class="form-control" name="mother_email" id="mother_email" value="<?php echo set_value('mother_email', (isset($parent['mother_email']) ? $parent['mother_email'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Mother Mobile</label>
            <input type="text" class="form-control" name="mother_mobile" id="mother_mobile" value="<?php echo set_value('mother_mobile', (isset($parent['mother_mobile']) ? $parent['mother_mobile'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Mother Occupation</label>
            <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" value="<?php echo set_value('mother_occupation', (isset($parent['mother_occupation']) ? $parent['mother_occupation'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Mother Education</label>
            <input type="text" class="form-control" name="mother_education" id="mother_education" value="<?php echo set_value('mother_education', (isset($parent['mother_education']) ? $parent['mother_education'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        
    </div>
</div>