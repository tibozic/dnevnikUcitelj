<div class="container">

	<!-- FORMAT: 
	<div class="izpisek">
		<h3>Naslov</h3>
		<p>Avtor, Datum</p>
		<p>Dijak, Razred</p>
		<p>Vsebina</p>
	</div>
	-->

	<?php

		foreach($zapiski as $zapisek){
			echo '<div class="izpisek">
					<h3>'.trim($zapisek->naslovZapisek).', <a href="/public/vnos/index/'.$zapisek->idZapisek.'">Uredi</a></h3> 					
					<p>'.$zapisek->imeUporabnik.' '.$zapisek->priimekUporabnik.', '.$zapisek->datumZapisek.'</p>
					<p>'.$zapisek->imeDijak.' '.$zapisek->priimekDijak.', '. $zapisek->nazivRazred.'</p>
					<p>'.$zapisek->vsebinaZapisek.'</p>
				</div><br><br>';
		}

	?>

</div>