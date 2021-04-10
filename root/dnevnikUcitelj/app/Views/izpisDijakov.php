
	<div class="test">
		<table class="table">
			<tr>
				<th>Ime</th>
				<th>Priimek</th>
				<th>Razred</th>
				<th></th>
			</tr>


			<?php
				foreach($dijaki as $dijak){
					echo "
					<tr>
						<td>".$dijak->imeDijak."</td>
						<td>".$dijak->priimekDijak."</td>
						<td>".$dijak->nazivRazred."</td>
						<td><a href='".base_url()."/izpisGrafOcen/index/".$dijak->idDijak."'>Preglej</a></td>
					</tr>";
				}
			?>
		</table>
	</div>
