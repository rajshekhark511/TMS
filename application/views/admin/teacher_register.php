<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Branch Name</label>
            <?php echo form_dropdown('th_branch', $branches, (isset($teacher['th_branch']) ? $teacher['th_branch'] : ''),'id=th_branch class=form-control'); ?>
            <?php echo form_error('th_branch', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
           
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="text" class="form-control" name="th_dob" id="th_dob" value="<?php echo set_value('th_dob', (isset($teacher['th_dob']) ? $teacher['th_dob'] : '')); ?>">
            <?php echo form_error('th_dob', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Blood Group</label>
            <?php echo form_dropdown('th_blood_group', array('' => '[--Select--]', 'A+' => 'A+', 'A-' => 'A-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+'), (isset($teacher['th_blood_group']) ? $teacher['th_blood_group'] : ''), 'id=th_blood_group class=form-control'); ?>
            <?php echo form_error('th_blood_group', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="th_address" id="th_address"><?php echo set_value('th_address', (isset($teacher['th_address']) ? $teacher['th_address'] : '')); ?></textarea>
            <?php echo form_error('th_address', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="form-group">
            <label>Marital Status</label><br>
            <input name="th_marital_status" id="th_marital_status" value="Single" type="radio" <?php echo set_value('th_marital_status',((isset($teacher['th_marital_status']) && $teacher['th_marital_status']=='Single') ? 'checked' : '')); ?>>&nbsp;Single&nbsp;&nbsp;
            <input name="th_marital_status" id="th_marital_status" value="Married" type="radio" <?php echo set_value('th_marital_status',((isset($teacher['th_marital_status']) && $teacher['th_marital_status']=='Married') ? 'checked' : '')); ?>>&nbsp;Married
            <?php echo form_error('th_marital_status', '<div class="text-danger">', '</div>'); ?>
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
            <?php echo form_dropdown('th_state', $arrState, (isset($teacher['th_state']) ? $teacher['th_state'] : ''), 'id=th_state class=form-control'); ?>
            <?php echo form_error('th_state', '<div class="text-danger">', '</div>'); ?>
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
            <?php echo form_dropdown('th_district', $arrDist, (isset($teacher['th_district']) ? $teacher['th_district'] : ''), 'id=th_district class=form-control'); ?>
            <?php echo form_error('th_district', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="th_city" id="th_city" value="<?php echo set_value('th_city',(isset($teacher['th_city']) ? $teacher['th_city'] : '')); ?>"/>
            <?php echo form_error('th_city', '<div class="text-danger">', '</div>'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Pin Code</label>
            <input type="text" class="form-control" name="th_pincode" id="th_pincode" value="<?php echo set_value('th_pincode',(isset($teacher['th_pincode']) ? $teacher['th_pincode'] : '')); ?>"/>
            <?php echo form_error('th_pincode', '<div class="text-danger">', '</div>'); ?>
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
                <?php $arrLang = (isset($teacher['th_language_known'])) ? json_decode($teacher['th_language_known'],true) : array(); ?>
                <?php if(isset($teacher['th_language_known'])){ ?>
                    <?php $i = 1; foreach($arrLang as $key => $val){ ?>
                    <tr>
                        <td style="text-align:left"><input type="text" class="form-control" name="th_language[<?php echo $i; ?>]" value="<?php echo $key; ?>"></td>
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
                        <td style="text-align:left"><input type="text" class="form-control" name="th_language[<?php echo $i; ?>]"></td>
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