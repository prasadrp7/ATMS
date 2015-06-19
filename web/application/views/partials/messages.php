<div id="error_msg_cont">
<?php
if ($this->session->flashdata('success') != null) {
    ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php
    $this->session->set_flashdata('success',null);
}
if ($this->session->flashdata('error') != null) {
    ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php
    $this->session->set_flashdata('error',null);
}
if ($this->session->flashdata('warning') != null) {
    ?>
    <div class="alert alert-warning">
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
    <?php
    $this->session->set_flashdata('warning',null);
}
if ($this->session->flashdata('info') != null) {
    ?>
    <div class="alert alert-info">
        <?php echo $this->session->flashdata('info'); ?>
    </div>
    <?php
    $this->session->set_flashdata('info',null);
}
?>
</div>