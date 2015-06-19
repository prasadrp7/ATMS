<h3>Add/Update Student</h3>
<div class="row">
    <div class="col-lg-6">
        <?php echo form_open(); ?>
            <div class="form-group">
                <?php echo form_label('Name'); ?>
                <?php echo form_input('name', set_value('name',@$name), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('name', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('User Name'); ?>
                <?php echo form_input('username', set_value('username',@$username), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('username', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Password'); ?>
                <?php echo form_password('password', set_value('password',@$password), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('password', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Email'); ?>
                <?php echo form_input('email', set_value('email',@$email), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('email', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_hidden("user_type","Student"); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Batches'); ?>
                <?php echo form_dropdown('batch_id[]', $this->model_batches->getDropdownData(), set_value('batch_id[]',@$user_type), "class='form-control dropdown-chosen' multiple='multiple'"); ?>
                <?php echo form_error('batch_id[]', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <?php if ($mode == "edit") { ?>
                <?php echo form_submit('addbtn','Update',"class='btn btn-info'"); ?>
            <?php } else { ?>
                <?php echo form_submit('addbtn','Add',"class='btn btn-info'"); ?>
            <?php } ?>
            <a href="<?php echo base_url('student'); ?>" class="btn btn-default">Cancel</a>
        <?php echo form_close(); ?>
    </div>
</div>
<!-- /.row -->