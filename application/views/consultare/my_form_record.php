<div class="container mt-5">
	<div class="card">
		<div class="card-header">
		<h4>My Form Records
		<a href="<?php echo site_url('Forms/Consultare/my_form') ?>" class="btn btn-primary float-right" >Add New</a>
		</h4>
		</div>
	</div>
	<div class="mt-2">
		<table id="form-table" class="table table-bordered">
			<thead>
				<tr>
					<th>Company Name</th>
					<th>Performed Date</th> 
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if ($records) : 
				 	foreach($records as $record) : 
				?>
				<tr>
					<td><?= $record['company_name'] ?></td>
					<td><?= date_format(date_create($record['performed_date']), "m/d/Y") ?></td>
					<td>
						<a href="<?php echo site_url("Records/Consultare/my_form/details?id=1") ?>"><i class="bi bi-eye"></i></a>
					</td>
				</tr>
				<?php 
					endforeach;
					endif;
				?>
			</tbody>
		</table>
	</div>
</div>
