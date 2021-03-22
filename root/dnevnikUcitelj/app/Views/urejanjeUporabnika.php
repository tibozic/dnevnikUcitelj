<div class="container">


	<form action="<?php base_url() ?>/urejanjeUporabnika/shrani/<?php echo $uporabnik[0]->idUporabnik; ?>" method="post">
		<div class="row">
			<div class="col">
				<div class="form-group">
		    		<label for="ime">Ime:</label>
		    		<input type="text" class="form-control" id="ime" name="ime" value="<?php echo $uporabnik[0]->imeUporabnik; ?>">
		      	</div>
		     </div>
		     <div class="col">
		     	<div class="form-grouppriimek">
		    		<label for="priimek">Priimek:</label>
		    		<input type="text" class="form-control" id="priimek" name="priimek" value="<?php echo $uporabnik[0]->priimekUporabnik; ?>">
		      	</div>
		     </div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
		    		<label for="email">Email:</label>
		    		<input type="text" class="form-control" id="email" name="email" value="<?php echo $uporabnik[0]->emailUporabnik; ?>">
		      	</div>
		     </div>
		     <div class="col">
		     	<div class="form-grouppriimek">
		    		<label for="vloga">Vloga:</label>
		    		<select name="vloga" id="vloga" class="form-control" value="<?php echo $uporabnik[0]->nazivVloga; ?>">
		    			<?php 
		    				foreach($vloge as $vloga){
		    					echo "<option value=".$vloga->idVloga." ";
		    					if($uporabnik[0]->nazivVloga==$vloga->nazivVloga){ echo "selected";}
		    					echo ">".$vloga->nazivVloga."</option>";
		    				}
		    			?>
		    		</select>
		      	</div>
		     </div>
		</div>
		<br>
		<input type="submit" class="btn btn-primary" value="Shrani">
	</form>

</div>