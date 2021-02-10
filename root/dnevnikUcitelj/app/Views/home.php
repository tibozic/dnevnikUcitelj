<div class="container">
	<h1>Pozdravljen, <?php echo session()->get('imeUporabnik') ?></h1>
	<h3>
	Vloga: <?php echo session()->get('vlogaUporabnik') ?>
	<?php 
		echo "<br>";
		echo base_url();
		echo "<br>";
		echo site_url();
	?>
	</h3>
</div>