<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php base_url() ?>/assets/CSS/bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php base_url() ?>/assets/CSS/style2.css">
<meta charset="UTF-8">
<title><?= $title ?></title>
</head>

<body>

<!-- MENU ☰-->
<nav class="menu_celoten">
  <ul class="navbar-nav">
  	<?php
  		if(session()->get('vlogaUporabnik') == 'Administrator' || session()->get('vlogaUporabnik') == 'Ravnatelj'){
			echo "
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/home'>Domov </a> </li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/administracija'>Administracija </a></li>
				<li id='logout'><a class='nav-link menu_vsebina_text' href='".base_url()."/home/odjava'>Odjava </a></li>

  			";
  		}
		else if (session()->get('vlogaUporabnik') == 'Razrednik')
		{
			echo "
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/home'>Domov </a> </li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/vnos'>Nov zapisek </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisZapiskov_moji'>Moji Zapiski </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisZapiskov_razred'>Zapiski Razreda</a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisDijakov'>Dijaki </a></li>
				<li id='logout'><a class='nav-link menu_vsebina_text' href='".base_url()."/home/odjava'>Odjava </a></li>

  			";
		}
		else
		{
			echo "
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/home'>Domov </a> </li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/vnos'>Nov zapisek </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisZapiskov_moji'>Moji Zapiski </a></li>
				<li id='logout'><a class='nav-link menu_vsebina_text' href='".base_url()."/home/odjava'>Odjava </a></li>

  			";
  		}
  	?>
  </ul>
</nav><br>
<div class="naslovnica">
	<h1><?php echo $title; ?></h1>
</div>
<div class="container2">

