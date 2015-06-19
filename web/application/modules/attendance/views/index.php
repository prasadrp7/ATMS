<h2>Attendance</h2>
<div class="table-responsive">
	<table class="table">
		<tr>
			<td colspan="4">
				<a href="<?php echo base_url('attendance/add'); ?>" class="btn btn-success">Add New</a>
			</td>
		</tr>
	</table>
	<table class="table table-bordered table-hover table-striped">
		<thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>In</th>
                <th>Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($attendance as $key => $value) { ?>
	        <tr>
	            <td><?php echo $value['name']; ?></td>
	            <td><?php echo $this->sitesettings->getDateFormats($value['date'],'d M,Y'); ?></td>
	            <td><?php echo $this->sitesettings->getDateFormats($value['starttime'],'h:i A'); ?></td>
	            <td><?php echo $this->sitesettings->getDateFormats($value['endtime'],'h:i A'); ?></td>
	            <td><a href="<?php echo base_url('attendance/add/'.$value['attend_id']); ?>">Edit</a></td>
	        </tr>
        	<?php } ?>
	    </tbody>
	</table>
</div>