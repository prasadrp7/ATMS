<h2>Students</h2>
<div class="table-responsive">
	<table class="table">
		<tr>
			<td colspan="4">
				<a href="<?php echo base_url('student/add'); ?>" class="btn btn-success">Add New</a>
			</td>
		</tr>
	</table>
	<table class="table table-bordered table-hover table-striped">
		<thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($users as $key => $value) { ?>
	        <tr>
	            <td><?php echo $value['name']; ?></td>
	            <td><?php echo $value['email']; ?></td>
	            <td><?php echo $this->sitesettings->getDateFormats($value['updated_at'],'d M,Y h:i A'); ?></td>
	            <td><a href="<?php echo base_url('student/add/'.$value['user_id']); ?>">Edit</a></td>
	        </tr>
        	<?php } ?>
	    </tbody>
	</table>
</div>