<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <?php echo form_open(); ?>
            <div class="form-group">
                <?php echo form_label('User Name'); ?>
                <?php echo form_input('useremail', set_value('useremail'), "class='form-control' type='email'"); ?>
                <?php echo form_error('useremail', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <div class="form-group">
                <?php echo form_label('Password'); ?>
                <?php echo form_password('password', set_value('password'), "class='form-control'"); ?>
                <?php echo form_error('password', '<label class="label-danger">', '</label>'); ?>
                <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>

            <?php echo form_submit('loginbtn','Login',"class='btn btn-default'"); ?>
        <?php echo form_close(); ?>

    </div>
    <div class="col-lg-4"></div>
</div>
<!-- /.row -->