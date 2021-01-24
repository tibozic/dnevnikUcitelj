<div class="container">
	<form action="/public/vnos/vnosZapiska" method="post">
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
        <?php

          for($i=1; $i<6; $i++){
            if($podatki[0]->ocenaZapisek == $i){
              echo '<input type="radio" id="'.$i.'" name="ocena" value="'.$i.'" checked>
                <label for="'.$i.'"> '.$i.' &nbsp;&nbsp;&nbsp;</label>';
            }else {
              echo '<input type="radio" id="'.$i.'" name="ocena" value="'.$i.'">
                <label for="'.$i.'"> '.$i.' &nbsp;&nbsp;&nbsp;</label>';
            }
          }

        ?>
      </div>
  		<div class="form-group">
    		<label for="vsebina">Vsebina:</label>
    		<textarea name="vsebina" id="vsebina" class="form-control"><?php echo $podatki[0]->vsebinaZapisek ?></textarea>
  		</div>
  		<button type="submit" class="btn btn-primary">Shrani</button>
      <button type="submit" class="btn btn-success">Zakjuči</button>
      
</form>	
</div>