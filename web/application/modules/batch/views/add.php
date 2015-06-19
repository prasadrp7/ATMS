<h3>Add/Update Batch</h3>
<div class="row">
    <div class="col-lg-6">
        <?php echo form_open(); ?>
            <div class="form-group">
                <?php echo form_label('Name'); ?>
                <?php echo form_input('batch_name', set_value('batch_name',@$batch_name), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('batch_name', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Code'); ?>
                <?php echo form_input('batch_code', set_value('batch_code',@$batch_code), "class='form-control' autocomplete='off'"); ?>
                <?php echo form_error('batch_code', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <?php if ($mode == "edit") { ?>
                <?php echo form_submit('addbtn','Update',"class='btn btn-info'"); ?>
            <?php } else { ?>
                <?php echo form_submit('addbtn','Add',"class='btn btn-info'"); ?>
            <?php } ?>
            <a href="<?php echo base_url('batch'); ?>" class="btn btn-default">Cancel</a>
        <?php echo form_close(); ?>
    </div>
</div>
<!-- /.row -->