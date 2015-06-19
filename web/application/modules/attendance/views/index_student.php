<h2>My Attendance</h2>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
            <tr>
                <th>Date</th>
                <th>In</th>
                <th>Out</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($attendance as $key => $value) { ?>
	        <tr>
	            <td><?php echo $this->sitesettings->getDateFormats($value['date'],'d M,Y'); ?></td>
	            <td><?php echo $this->sitesettings->getDateFormats($value['starttime'],'h:i A'); ?></td>
	            <td><?php echo $this->sitesettings->getDateFormats($value['endtime'],'h:i A'); ?></td>
	        </tr>
        	<?php } ?>
	    </tbody>
	</table>
</div>