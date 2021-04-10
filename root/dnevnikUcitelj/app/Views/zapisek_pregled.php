


<h2>
Naslov: <?php echo $zapisek_podatki[0]->naslovZapisek;?><br>
</h2>
<h3>
Ocena: <?php 
for ($i = 0; $i < $zapisek_podatki[0]->ocenaZapisek; $i++)
{
	echo "<img src='/assets/bootstrap-icons/star-fill.svg' class='ocena_zvezdica'>&nbsp;&nbsp;";
}
for( $j = (5 - $zapisek_podatki[0]->ocenaZapisek); $j > 0; $j--)
{
	echo "<img src='/assets/bootstrap-icons/star.svg' class='ocena_zvezdica'>&nbsp;&nbsp;";
}
echo "(" . $zapisek_podatki[0]->ocenaZapisek . "/5)";
?><br>
Avtor: <?php echo $zapisek_podatki[0]->imeUporabnik . " " . $zapisek_podatki[0]->priimekUporabnik . ", " . $zapisek_podatki[0]->datumZapisek;?><br>
Dijak: <?php echo $zapisek_podatki[0]->imeDijak . " " . $zapisek_podatki[0]->priimekDijak . ", " . $zapisek_podatki[0]->nazivRazred;?><br>
Predmet: <?php echo $zapisek_podatki[0]->nazivPredmet;?>
</h3>
<div class="vsebina">
<?php echo $zapisek_podatki[0]->vsebinaZapisek; ?>
</diV>









