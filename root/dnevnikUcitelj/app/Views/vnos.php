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
        <input type="radio" id="1" name="ocena" value="1">
        <label for="1"> 1 </label>
        <input type="radio" id="2" name="ocena" value="2">
        <label for="2"> 2 </label>
        <input type="radio" id="3" name="ocena" value="3">
        <label for="3"> 3 </label>
        <input type="radio" id="4" name="ocena" value="4">
        <label for="4"> 4 </label>
        <input type="radio" id="5" name="ocena" value="5">
        <label for="5"> 5 </label>
      </div>
  		<div class="form-group">
    		<label for="vsebina">Vsebina:</label>
    		<textarea name="vsebina" id="vsebina" class="form-control"></textarea>
  		</div>
  		<button type="submit" class="btn btn-primary">Shrani</button>
      <button type="submit" class="btn btn-success">Zakjuči</button>
</form>	
</div>