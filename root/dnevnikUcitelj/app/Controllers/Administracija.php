<?php namespace App\Controllers;

class Administracija extends BaseController
{
	public function index(){

		/*

			Prikaz in urejanje vseh uporabnikov

		*/


		$session=session();
		$db = \Config\Database::connect();



		$data["title"]="Administracija";

		$builder="SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN Vloga ON Vloga_idVloga=idVloga";
		$query = $db->query($builder);
		$results=$query->getResult();
		$data["uporabniki"]=$results;





		echo view("header.php",$data);
		echo view("administracija.php");
		echo view("footer.php");
	}

	function urejanjeUporabnika($idUporabnik){
		echo "idUporanika: ";
		echo $idUporabnik;


	}



	//--------------------------------------------------------------------

}
