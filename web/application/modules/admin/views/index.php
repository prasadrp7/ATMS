<h2>My Information</h2>
<?php
	$user = $this->session->userdata('user'); 
	$this->load->model('attendance/model_attendance');
	$data_arr = $this->model_attendance->execQuery("SELECT date,COUNT(DISTINCT(user_id)) as cnt FROM `attendance` GROUP BY date");
	foreach ($data_arr as $key => $value) {
		$graph_data['data'][] = array("x"=>$this->sitesettings->getDateFormats($value['date'],'d M,Y'),"y"=>$value['cnt']);
	}
?>
<table class="table table-borderd">
	<tr>
		<td width="50%">Name</td>
		<td width="50%"><?php echo $user['name']; ?></td>
	</tr>
	<tr>
		<td width="50%">E-Mail</td>
		<td width="50%"><?php echo $user['email']; ?></td>
	</tr>
	<tr>
		<td width="50%">Password</td>
		<td width="50%"><?php echo str_pad("", strlen($user['password']), "*"); ?></td>
	</tr>
</table>

<?php if ($user['user_type'] != "Student") { ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Attendance Graph</h3>
            </div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-line-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var graph_json = ('<?php echo json_encode($graph_data); ?>');
</script>
<?php } ?>
