<?php
$module = $this->router->fetch_module();
?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
<?php
if ($userinfo['user_type'] == "SuperAdmin") {
    ?>
        <li <?php echo ($module=="admin") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li <?php echo ($module=="attendance") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('attendance'); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Attendance</a>
        </li>
        <li <?php echo ($module=="batch") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('batch'); ?>"><i class="fa fa-fw fa-users"></i> Batches</a>
        </li>
        <li <?php echo ($module=="member") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('member'); ?>"><i class="fa fa-fw fa-user-md"></i> Admins</a>
        </li>
        <li <?php echo ($module=="student") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('student'); ?>"><i class="fa fa-fw fa-user"></i> Students</a>
        </li>
    <?php
} elseif ($userinfo['user_type'] == "Admin") {
    ?>
        <li <?php echo ($module=="admin") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li <?php echo ($module=="attendance") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('attendance'); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Attendance</a>
        </li>
        <li <?php echo ($module=="batch") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('batch'); ?>"><i class="fa fa-fw fa-users"></i> Batches</a>
        </li>
        <li <?php echo ($module=="student") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('student'); ?>"><i class="fa fa-fw fa-user"></i> Students</a>
        </li>
    <?php
} elseif ($userinfo['user_type'] == "Student") {
    ?>
        <li <?php echo ($module=="admin") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li <?php echo ($module=="attendance") ? "class='active'" : ""; ?> >
            <a href="<?php echo base_url('attendance'); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Attendance</a>
        </li>
    <?php
}
?>
    </ul>
</div>
