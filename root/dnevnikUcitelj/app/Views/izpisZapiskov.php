<div class="container">

	<!-- FORMAT: 
	<div class="izpisek">
		<h3>Naslov</h3>
		<p>Avtor, Datum</p>
		<p>Dijak, Razred</p>
		<p>Vsebina</p>
	</div>
	-->
	<h1>
		Vaši zapiski:
	</h1>

	<?php

		foreach($zapiski as $zapisek){
			echo '<div class="izpisek">
					<h3>'.trim($zapisek->naslovZapisek).', <a href="'.base_url().'/vnos/index/'.$zapisek->idZapisek.'">Uredi</a></h3> 					
					<p>'.$zapisek->imeUporabnik.' '.$zapisek->priimekUporabnik.', '.$zapisek->datumZapisek.'</p>
					<p>'.$zapisek->imeDijak.' '.$zapisek->priimekDijak.', '. $zapisek->nazivRazred.'</p>
					<p>'.$zapisek->vsebinaZapisek.'</p>
				</div><br><br>';
		}

	?>

</div>