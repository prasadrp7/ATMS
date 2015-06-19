<h3>Add/Update Atendance</h3>
<div class="row">
    <div class="col-lg-6">
        <?php echo form_open(); ?>
            <div class="form-group">
                <?php echo form_label('Date'); ?>
                <?php echo form_input('date', set_value('date',@$date), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('date', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Start Time'); ?>
                <?php echo form_input('starttime', set_value('starttime',@$starttime), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('starttime', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('End Time'); ?>
                <?php echo form_input('endtime', set_value('endtime',@$endtime), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('endtime', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Name'); ?>
                <?php echo form_dropdown('user_id', $this->model_users->getDropdownUsers("user_type='Student'"), set_value('user_id',@$user_id), "class='form-control'"); ?>
                <?php echo form_error('user_id', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <?php if ($mode == "edit") { ?>
                <?php echo form_submit('addbtn','Update',"class='btn btn-info'"); ?>
            <?php } else { ?>
                <?php echo form_submit('addbtn','Add',"class='btn btn-info'"); ?>
            <?php } ?>
            <a href="<?php echo base_url('attendance'); ?>" class="btn btn-default">Cancel</a>
        <?php echo form_close(); ?>
    </div>
</div>
<!-- /.row -->