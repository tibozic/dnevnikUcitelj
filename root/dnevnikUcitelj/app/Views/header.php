<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/public/assets/CSS/bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="/public/assets/CSS/style.css">
<meta charset="UTF-8">
<title><?= $title ?></title>
</head>

<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg menu">
<div class="container">
  <ul class="navbar-nav">
  	<?php
  		if(session()->get('vlogaUporabnik') == 'Administrator' || session()->get('vlogaUporabnik') == 'Ravnatelj'){
  			echo "
				<li class='nav-item'> <a class='nav-link vsebina' href='/public/home'>Domov </a> </li>
			    <li class='nav-item'><a class='nav-link vsebina' href='/public/vnos'>Vnos </a></li>
			    <li class='nav-item'><a class='nav-link vsebina' href='/public/izpisZapiskov'>Zapiski </a></li>
			    <li class='nav-item'><a class='nav-link vsebina' href='/public/administracija'>Administracija </a></li>
          <li class='nav-item'><a class='nav-link vsebina' href='/public/izpisDijakov'>Dijaki </a></li>
			    <li class='nav-item'><a class='nav-link vsebina' href='/public/test'>Test </a></li>
			    <li class='nav-item' id='logout'><a class='nav-link vsebina' href='/public/home/odjava'>Odjava </a></li>

  			";
  		}else{
  			echo "
				<li class='nav-item'> <a class='nav-link vsebina' href='/public/home'>Domov </a> </li>
				    <li class='nav-item'><a class='nav-link vsebina' href='/public/vnos'>Vnos </a></li>
				    <li class='nav-item'><a class='nav-link vsebina' href='/public/izpisZapiskov'>Zapiski </a></li>
				    <li class='nav-item'><a class='nav-link vsebina' href='/public/test'>Test </a></li>
				    <li class='nav-item' id='logout'><a class='nav-link vsebina' href='/public/home/odjava'>Odjava </a></li>
  			";
  		}


  	?>
  	<!--	
    <li class="nav-item"> <a class="nav-link vsebina" href="/public/home">Domov </a> </li>
    <li class="nav-item"><a class="nav-link vsebina" href="/public/vnos">Vnos </a></li>
    <li class="nav-item"><a class="nav-link vsebina" href="/public/izpisZapiskov">Zapiski </a></li>
    <li class="nav-item"><a class="nav-link vsebina" href="/public/administracija">Administracija </a></li>
    <li class="nav-item"><a class="nav-link vsebina" href="/public/test">Test </a></li>
    <li class="nav-item"><a class="nav-link vsebina" href="/public/UrejanjeUporabnika/odjava">Odjava </a></li>
	-->

  </ul>
</div>
</nav><br>

