
	<!-- FORMAT: 
	<div class="izpisek">
		<h3>Naslov</h3>
		<p>Avtor, Datum</p>
		<p>Dijak, Razred</p>
		<p>Vsebina</p>
	</div>
	-->
	<div class="izpiski">
	<?php
		foreach($zapiski as $zapisek){
			echo '<div class="izpisek">
					<h3>'.trim($zapisek->naslovZapisek).'</a></h3> 
					<p>'.$zapisek->nazivPredmet. ", ".$zapisek->imeUporabnik.' '.$zapisek->priimekUporabnik.', '.$zapisek->datumZapisek.'</p>
					<p>'.$zapisek->imeDijak.' '.$zapisek->priimekDijak.', '. $zapisek->nazivRazred.'</p>
					<p class="zapisek_vsebina">'.$zapisek->vsebinaZapisek.'</p>
					<a href="'.base_url().'/zapisek_pregled/index/'.$zapisek->idZapisek.'"><button class="btn btn-success">Preglej</button></a>
				</div>';
		}

	?>
	</div>
