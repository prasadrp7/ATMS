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

    <!-- Custom styles -->
    <style type="text/css">
    .paddnone {padding: 0px !important;}
    </style>
</head>

<body>

    <div id="wrapper" class="<?php echo ($this->acl->checkLoggedIn()) ? '' : 'paddnone'; ?> ">
        <?php $this->template->renderPartial('adminheader'); ?>
        <div id="page-wrapper">

            <div class="container-fluid">