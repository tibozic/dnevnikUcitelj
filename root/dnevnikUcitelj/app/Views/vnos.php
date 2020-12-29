<div class="container">
	<form action="/public/vnos/vnosZapiska" method="post">
  		<div class="form-group">
    		<label for="naslov">Naslov:</label>
    		<input type="text" class="form-control" id="naslov" name="naslov">
      </div>
  		<div class="form-group">
    		<label for="dijak">Dijak:</label>
    		<select name="dijak" id="dijak" class="form-control">
    			<?php
    				foreach($results as $row){
    					echo $row->idDijak;
    					echo "<option value=".$row->idDijak.">".$row->imeDijak." ".$row->priimekDijak.", ".$row->nazivRazred."</option>";
    				}
    			?>
    		</select>
  		</div>
  		<div class="form-group">
    		<label for="vsebina">Vsebina:</label>
    		<textarea name="vsebina" id="vsebina" class="form-control"></textarea>
  		</div>
  		<button type="submit" class="btn btn-primary">Submit</button>
</form>	
</div>