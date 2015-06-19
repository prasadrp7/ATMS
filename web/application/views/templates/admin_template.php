<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">
        <?php $this->template->renderPartial('adminheader'); ?>
        <div id="page-wrapper">
            <?php $this->template->renderPartial('messages'); ?>

            <div class="container-fluid">
		        <?php echo $body; ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Chosen plugins -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chosen.css') ?>"/>
    <script type="text/javascript" src="<?php echo base_url('assets/js/chosen.jquery.js') ?>"></script>

    <?php echo $this->assetmanager->run_all(); ?>
    
    <!-- Application js -->
    <script src="<?php echo base_url('assets/js/application.js') ?>"></script>

</body>

</html>