<!DOCTYPE hmtl>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="/CSS/style2.css">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Login</title>
	<style>
		body{
			background-image:url('/images/notebook_square.jpg');
		}
	</style>
</head>
<body>
	<!-- menu -->
	<div id="menu">
		<ul id="menu_list">
			<li><a href="">Domov</a></li>
			<li><a href="">Dnevnik</a></li>
		</ul>
	</div>

	<!-- form -->
	<div class="text-center">
		<div class="form-start">
			<h1>Prijava</h1>
			<form action="/login/login" method="post">
				<label for="email">E-mail:</label>
					<input id="email" name="email" type="text">
					<br><br>
					<label for="geslo">Geslo:</label>
					<input id="geslo" name="geslo" type="password">
					<br><br>
					<button type="submit" class="btn-primary">Prijava</button>
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