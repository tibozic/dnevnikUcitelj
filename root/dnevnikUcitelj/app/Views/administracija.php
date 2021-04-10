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
					<td>".$uporabnik->imeUporabnik."</td>
					<td>".$uporabnik->priimekUporabnik."</td>
					<td>".$uporabnik->emailUporabnik."</td>
					<td>".$uporabnik->nazivVloga."</td>
					<td><a href='".base_url()."/urejanjeUporabnika/index/".$uporabnik->idUporabnik."'>Uredi</a></td>
				</tr>";
			}

			?>




		</table>
	</div>

