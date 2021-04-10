<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php base_url() ?>/assets/CSS/bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php base_url() ?>/assets/CSS/style2.css">
<meta charset="UTF-8">
<title><?= $title ?></title>
</head>

<body>

<!-- MENU -->
<nav class="menu_celoten">
  <ul class="navbar-nav">
  	<?php
  		if(session()->get('vlogaUporabnik') == 'Administrator' || session()->get('vlogaUporabnik') == 'Ravnatelj'){
			echo "
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/home'>Domov </a> </li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/vnos'>Vnos </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisZapiskov'>Zapiski </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/administracija'>Administracija </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisDijakov'>Dijaki </a></li>
				<li> <a class='nav-link menu_vsebina_text' href='".base_url()."/test'>Test </a></li>
				<li id='logout'><a class='nav-link menu_vsebina_text' href='".base_url()."/home/odjava'>Odjava </a></li>

  			";
  		}else{
			  echo "
			  	<div class='menu_vsebina_kvadrat'>
				<li class='nav-item'> <a class='nav-link menu_vsebina_text' href='".base_url()."/home'>Domov </a> </li>
				</div>
				<li class='nav-item menu_vsebina_kvadrat'> <a class='nav-link menu_vsebina_text' href='".base_url()."/vnos'>Vnos </a></li>
				<li class='nav-item menu_vsebina_kvadrat'> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisZapiskov'>Zapiski </a></li>
				<li class='nav-item menu_vsebina_kvadrat'> <a class='nav-link menu_vsebina_text' href='".base_url()."/izpisDijakov'>Dijaki </a></li>
				<li class='nav-item menu_vsebina_kvadrat'> <a class='nav-link menu_vsebina_text' href='".base_url()."/test'>Test </a></li>
				<li class='nav-item menu_kvadrat' id='logout'><a class='nav-link menu_vsebina_text' href='".base_url()."/home/odjava'>Odjava </a></li>
  			";
  		}
  	?>
  </ul>
</nav><br>
<div class="naslovnica">
	<h1><?php echo $title; ?></h1>
</div>
<div class="container2">

