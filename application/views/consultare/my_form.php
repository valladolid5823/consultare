<div class="row mt-5">
	<div class="col-md-6 mx-auto">
		<div class="card">
			<div class="card-header">
			<h4>My Form</h4>
			</div>
		</div>
		<div class="mt-2">
			<form action="<?php echo site_url("Forms/Consultare/my_form") ?>" method="POST">
				<div class="form-group">
					<label for="">Company Name</label>
					<input type="text" name="company_name" class="form-control">
					<small class="text-danger" ><?php echo form_error('first_name'); ?></small>
				</div>

				<div class="form-group">
					<label for="">Performed Date</label>
					<input type="date" name="performed_date" class="form-control">
					<small class="text-danger" ><?php echo form_error('last_name'); ?></small>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit" name="save_my_form" >Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
