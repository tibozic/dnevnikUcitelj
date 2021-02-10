<div class="container">
	<form action="<?php base_url() ?>/vnos/vnosZapiska<?php echo '/'.$podatki[0]->idZapisek ?>" method="post">
  		<div class="form-group">
    		<label for="naslov">Naslov:</label>
    		<input type="text" class="form-control" id="naslov" name="naslov" value="<?php echo $podatki[0]->naslovZapisek ?>">
      </div>
  		<div class="form-group">
    		<label for="dijak">Dijak:</label>
    		<select name="dijak" id="dijak" class="form-control">
    			<?php
    				foreach($results as $row){
    					echo $row->idDijak;
              if($row->idDijak == $podatki[0]->Dijak_idDijak){
                echo "<option value=".$row->idDijak." selected>".$row->imeDijak." ".$row->priimekDijak.", ".$row->nazivRazred."</option>";
              }else{
    					 echo "<option value=".$row->idDijak.">".$row->imeDijak." ".$row->priimekDijak.", ".$row->nazivRazred."</option>";
              }
    				}
    			?>
    		</select>
  		</div>
      <div class="form-group">
        <div class="zvezdice">
            <?php

              for($i=5; $i>0; $i--){
                if($podatki[0]->ocenaZapisek == $i){
                  echo '<input type="radio" id="zvezdica-'.$i.'" class="zvezdica zvezdica-'.$i.'" name="ocena" value="'.$i.'" checked>
                    <label for="zvezdica-'.$i.'" class="zvezdica zvezdica-'.$i.'"></label>';
                }else {
                  echo '<input type="radio" id="zvezdica-'.$i.'" class="zvezdica zvezdica-'.$i.'" name="ocena" value="'.$i.'">
                    <label for="zvezdica-'.$i.'" class="zvezdica zvezdica-'.$i.'"></label>';
                }
              }

               //<img src="/public/assets/bootstrap-icons/star-fill.svg" alt="'.$i.'"> 
            ?>
        </div>
      </div>
  		<div class="form-group">
    		<label for="vsebina">Vsebina:</label>
    		<textarea name="vsebina" id="vsebina" class="form-control"><?php echo $podatki[0]->vsebinaZapisek ?></textarea>
  		</div>
  		<button type="submit" class="btn btn-primary">Shrani</button> 
</form>	
</div>