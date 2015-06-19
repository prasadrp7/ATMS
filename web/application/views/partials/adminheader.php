<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">AMS</a>
    </div>
    <!-- Top Menu Items -->
    <?php if ($this->acl->checkLoggedIn()) {
        $userinfo = $this->session->userdata('user');
     ?>
        <ul class="nav navbar-right top-nav">
            <!-- Messages tab -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-footer">
                        <a>No Messages</a>
                    </li>
                </ul>
            </li>
            
            <!-- Alerts tab -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a>No Alerts</a>
                    </li>
                </ul>
            </li>
            
            <!-- Profile tab -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userinfo['name']; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url('profile') ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url('site/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <?php $this->template->renderPartial('adminsidebar', array('userinfo'=>$userinfo)); ?>
    <?php } else { ?>
        <ul class="nav navbar-right top-nav">
            <li><a href="<?php echo base_url('site/login') ?>"><i class="fa fa-envelope"></i> Login</a></li>
        </ul>
    <?php } ?>
<!-- /.navbar-collapse -->
</nav>
