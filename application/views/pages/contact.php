<h1><?php echo $title; ?></h1>

<div class="row">
	<div class="col-xs-12">
		<form name="contactform" method="post" action="/assets/php/send_form_email.php">
			<div class="form-group">
				<label for="first_name" class="control-label">First Name</label>
				<input class="form-control" required type="text" name="first_name" maxlength="50" size="30" placeholder="John">
			</div>
			<div class="form-group">
				<label for="last_name" class="control-label">Last Name</label>
				<input class="form-control" required type="text" name="last_name" maxlength="50" size="30" placeholder="Smith">
			</div>
			<div class="form-group">
				<label for="email" class="control-label">Email Address</label>
				<input class="form-control" required type="email" name="email" maxlength="50" size="30" placeholder="john@smith.com">
			</div>
			<div class="form-group">
				<label for="telephone" class="control-label">Telephone Number</label>
				<input class="form-control" type="text" name="telephone" maxlength="50" size="30" placeholder="123-456-7890">
			</div>
			<div class="form-group">
				<label for="message" class="control-label">Message</label>
				<textarea class="form-control" required name="message" rows="6" placeholder="Hello, I am looking for a great videographer!"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" value="submit" class="left btn btn-primary">Email Form</button>
			</div>
		</form>
	</div>
</div>