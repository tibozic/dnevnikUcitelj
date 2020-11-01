<html>
<head>
<link rel="stylesheet" href="/public/CSS/bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="/public/CSS/style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Registracija</title>

</head>
<body>

	<!-- form -->
	<div class="text-center">
		<div class="form-start">
			<h1>Registracija</h1>
			<form action="/public/register/register" method="post">
				<label for="ime">Ime: </label><br>
				<input id="ime" name="ime" type="text">
				<br><br>
				<label for="priimek">Priimek: </label><br>
				<input id="priimek" name="priimek" type="text">
				<br><br>
				<label for="email">Email: </label><br>
				<input id="email" name="email" type="text">
				<br><br>
				<label for="geslo">Geslo: </label><br>
				<input id="geslo" name="geslo" type="password">
				<br><br>
				<label for="potrdi_geslo">Potrdi geslo: </label><br>
				<input id="potrdi_geslo" name="potrdi_geslo" type="password">
				<br><br>
				<button type="submit" class="btn-primary">Registriraj</button>
			</form><br><br>
		<?php if (isset($validation)): ?>
			<div class="register_error" role="alert">
				<?php echo $validation->listErrors() ?>
			</div>
		<?php endif; ?>
		<a id="prijava_link" href="/public/login">Prijava</a>
		</div><br><br>
	</div>
</body>
</html>
