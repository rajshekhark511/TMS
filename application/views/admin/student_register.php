<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo '<pre>';
//print_r($student);
//print_r($branches);
//print_r($standard);
//print_r($batch);
?>
<header class="subtitle">
    <h5>Student Information</h5>
</header>
<br/>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="text" class="form-control" name="st_dob" id="st_dob" value="<?php echo set_value('st_dob', (isset($student['st_dob']) ? $student['st_dob'] : '')); ?>">
            <?php echo form_error('st_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Birth Place</label>
            <input type="text" class="form-control" name="st_birthplace" id="st_birthplace" value="<?php echo set_value('st_birthplace', (isset($student['st_birthplace']) ? $student['st_birthplace'] : '')); ?>">
            <?php echo form_error('st_birthplace', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Admission Number</label>
            <input type="text" class="form-control" name="st_admissionno" id="st_admissionno" value="<?php echo set_value('st_admissionno', (isset($student['st_admissionno']) ? $student['st_admissionno'] : '')); ?>">
            <?php echo form_error('st_admissionno', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Branch Name</label>
            <?php echo form_dropdown('st_branch', $branches, (isset($student['st_branch']) ? $student['st_branch'] : ''),'id=st_branch class=form-control'); ?>
            <?php echo form_error('st_branch', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Standard Name</label>
            <?php //$standard[''] = '[--Select--]'; ?>
            <?php echo form_dropdown('st_class', $standard, (isset($student['st_class']) ? $student['st_class'] : ''),'id=st_class class=form-control'); ?>
            <?php echo form_error('st_class', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Batch Name</label>
            <?php //$batch[''] = '[--Select--]'; ?>
            <?php echo form_dropdown('st_batch', $batch, (isset($student['st_batch']) ? $student['st_batch'] : ''),'id=st_batch class=form-control'); ?>
            <?php echo form_error('st_batch', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Roll Number</label>
            <input type="text" class="form-control" name="st_rollnumber" id="st_rollnumber" value="<?php echo set_value('st_rollnumber', (isset($student['st_rollnumber']) ? $student['st_rollnumber'] : '')); ?>">
            <?php //echo form_error('st_rollnumber', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Blood Group</label>
            <?php echo form_dropdown('st_blood_group', array('' => '[--Select--]', 'A+' => 'A+', 'A-' => 'A-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+'), (isset($student['st_blood_group']) ? $student['st_blood_group'] : ''), 'id=st_blood_group class=form-control'); ?>
            <?php //echo form_error('st_blood_group', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Height (Cms)</label>
            <input type="text" class="form-control" name="st_height" id="st_height" value="<?php echo set_value('st_height', (isset($student['st_height']) ? $student['st_height'] : '')); ?>">
            <?php //echo form_error('st_height', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Weight (Kg)</label>
            <input type="text" class="form-control" name="st_weight" id="st_weight" value="<?php echo set_value('st_weight', (isset($student['st_weight']) ? $student['st_weight'] : '')); ?>">
            <?php //echo form_error('st_weight', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Religion</label>
            <input type="text" class="form-control" name="st_religion" id="st_religion" value="<?php echo set_value('st_religion', (isset($student['st_religion']) ? $student['st_religion'] : '')); ?>">
            <?php //echo form_error('st_religion', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Mother Tongue</label>
            <input type="text" class="form-control" name="st_mothertongue" id="st_mothertongue" value="<?php echo set_value('st_mothertongue', (isset($student['st_mothertongue']) ? $student['st_mothertongue'] : '')); ?>">
            <?php //echo form_error('st_mothertongue', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="st_address" id="st_address"><?php echo set_value('st_address', (isset($student['st_address']) ? $student['st_address'] : '')); ?></textarea>
            <?php echo form_error('st_address', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Country</label>
            <input type="text" class="form-control" name="st_country" id="st_country" value="<?php echo set_value('st_country', (isset($student['st_country']) ? $student['st_country'] : '')); ?>">
            <?php echo form_error('st_country', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>State </label>
             <?php
             $arrState = array();
             $arrState[''] = '[--Select--]';
             if (!empty($states)) {
                foreach ($states as $sVal) { 
                    $arrState[$sVal['state_id']] = $sVal['name'];
                }
            }
            ?>
            <?php echo form_dropdown('st_state', $arrState, (isset($student['st_state']) ? $student['st_state'] : ''), 'id=st_state class=form-control'); ?>
            <?php echo form_error('st_state', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>District</label>
             <?php
             $arrDist = array();
             $arrDist[''] = '[--Select--]';
             if (!empty($district)) {
                foreach ($district as $dist) { 
                    $arrDist[$dist['d_id']] = $dist['d_name'];
                }
            }
            ?>
            <?php echo form_dropdown('st_district', $arrDist, (isset($student['st_district']) ? $student['st_district'] : ''), 'id=st_district class=form-control'); ?>
            <?php echo form_error('st_district', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="st_city" id="st_city" value="<?php echo set_value('st_city',(isset($student['st_city']) ? $student['st_city'] : '')); ?>"/>
            <?php echo form_error('st_city', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Pin Code</label>
            <input type="text" class="form-control" name="st_pincode" id="st_pincode" value="<?php echo set_value('st_pincode',(isset($student['st_pincode']) ? $student['st_pincode'] : '')); ?>"/>
            <?php echo form_error('st_pincode', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <table class="table table-bordered">
                <tr>
                    <td><label>Language Known</label></td>
                    <td><label>Speak&nbsp;&nbsp;Read&nbsp;&nbsp;Write</label></td>
                </tr>
                <?php $arrLang = (isset($student['st_language_known'])) ? json_decode($student['st_language_known'],true) : array(); ?>
                <?php if(isset($student['st_language_known'])){ ?>
                    <?php $i = 1; foreach($arrLang as $key => $val){ ?>
                    <tr>
                        <td style="text-align:left"><input type="text" class="form-control" name="st_language_known[<?php echo $i; ?>]" value="<?php echo $key; ?>"></td>
                        <td style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="speak[<?php echo $i; ?>]" value="1" <?php echo ($val['speak']==1) ? 'checked' : ''; ?> type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="read[<?php echo $i; ?>]" value="1" <?php echo ($val['read']==1) ? 'checked' : ''; ?> type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="write[<?php echo $i; ?>]" value="1" <?php echo ($val['write']==1) ? 'checked' : ''; ?> type="checkbox">
                        </td>
                    </tr>
                    <?php $i++; } ?>
                <?php }else {?>
                    <?php for($i=1;$i<=4;$i++){ ?>
                    <tr>
                        <td style="text-align:left"><input type="text" class="form-control" name="st_language_known[<?php echo $i; ?>]"></td>
                        <td style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="speak[<?php echo $i; ?>]" value="1" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="read[<?php echo $i; ?>]" value="1" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="write[<?php echo $i; ?>]" value="1" type="checkbox">
                        </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>  
