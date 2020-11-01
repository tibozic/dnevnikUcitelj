<!DOCTYPE hmtl>
<html> 
<head>
<link rel="stylesheet" href="/public/CSS/bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="/public/CSS/style2.css">

</head>
<body>
	<!-- form -->
	<div class="text-center">
		<div class="form-start">
			<h1>Prijava</h1>
			<form action="/public/login/login" method="post">
				<label for="email">E-mail:</label>
					<input id="email" name="email" type="text">
					<br><br>
					<label for="geslo">Geslo:</label>
					<input id="geslo" name="geslo" type="password">
					<br><br>
					<button type="submit" class="btn btn-primary">Prijava</button>
			</form><br><br>
		<?php if (isset($validation)): ?>
			<div class="register_error" role="alert">
				<?php echo $validation->listErrors() ?>
			</div>
		<?php endif; ?>
		<a id="prijava_link" href="/public/register">Registracija</a>
		</div><br><br>
	</div>
</body>
</html>
