<h2>Batches</h2>
<div class="table-responsive">
	<table class="table">
		<tr>
			<td colspan="4">
				<a href="<?php echo base_url('batch/add'); ?>" class="btn btn-success">Add New</a>
			</td>
		</tr>
	</table>
	<table class="table table-bordered table-hover table-striped">
		<thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($batches as $key => $value) { ?>
	        <tr>
	            <td><?php echo $value['batch_name']; ?></td>
	            <td><?php echo $value['batch_code']; ?></td>
	            <td><a href="<?php echo base_url('batch/add/'.$value['batch_id']); ?>">Edit</a></td>
	        </tr>
        	<?php } ?>
	    </tbody>
	</table>
</div>