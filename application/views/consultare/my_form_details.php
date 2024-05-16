<div class="container mt-5">
	<div class="card">
		<div class="card-header">
		<h4>My Record Details
		<a href="<?php echo site_url('Records/Consultare/my_form') ?>" class="btn btn-primary float-right" >Back</a>
		</h4>
		</div>
	</div>
	<div class="mt-5">
		<div class="d-flex flex-row align-items-center">
			<h6 class="mb-0 mr-2">Company Name: </h6>
			<div><?= $record_details->company_name ?></div>
		</div>
		<div class="d-flex flex-row align-items-center">
			<h6 class="mb-0 mr-2">Performed Date: </h6>
			<div><?= $record_details->performed_date ?></div>
		</div>

	</div>
</div>
