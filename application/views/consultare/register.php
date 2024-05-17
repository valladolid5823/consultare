
<h2>Register</h2>
<form id="registerForm" enctype="multipart/form-data">
	<label for="username">Username:</label>
	<input type="text" id="username" name="username"><br><br>
	<label for="email">Email:</label>
	<input type="email" id="email" name="email"><br><br>
	<label for="password">Password:</label>
	<input type="password" id="password" name="password"><br><br>
	<label for="userfile">Profile Picture:</label>
	<input type="file" id="userfile" name="userfile"><br><br>
	<button type="submit">Register</button>
</form>
<div id="response"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('#registerForm').on('submit', function(e) {
			e.preventDefault();

			var formData = new FormData(this);

			$.ajax({
				url: "<?php echo site_url('Register/register_user'); ?>",
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(data) {
					if(data.status == 'error') {
						$('#response').html('<div style="color:red;">' + data.message + '</div>');
					} else {
						$('#response').html('<div style="color:green;">' + data.message + '</div>');
					}
				}
			});
		});
	});
</script>

