<div class="container">
	<h1>Urejanje uporabnikov</h1>
	<div>
		<table class="table">
			<tr>
				<th>Ime</th>
				<th>Priimek</th>
				<th>Email</th>
				<th>Vloga</th>
				<th></th>
			</tr>
			<?php

			foreach($uporabniki as $uporabnik){
				echo "
				<tr>
					<th>".$uporabnik->imeUporabnik."</th>
					<th>".$uporabnik->priimekUporabnik."</th>
					<th>".$uporabnik->emailUporabnik."</th>
					<th>".$uporabnik->nazivVloga."</th>
					<th><a href='/public/urejanjeUporabnika/index/".$uporabnik->idUporabnik."'>Uredi</a></th>
				</tr>";
			}

			?>




		</table>
	</div>


</div>