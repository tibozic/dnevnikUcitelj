<div class="container">

	<h1>Dijaki: </h1>
	<div class="test">
		<table class="table">
			<tr>
				<th>Ime</th>
				<th>Priimek</th>
				<th></th>
			</tr>


			<?php
				foreach($dijaki as $dijak){
					echo "
					<tr>
						<th>".$dijak->imeDijak."</th>
						<th>".$dijak->priimekDijak."</th>
						<th><a href='".base_url()."/izpisGrafOcen/index/".$dijak->idDijak."'>Preglej</a></th>
					</tr>";
				}
			?>
		</table>
	</div>

</div>