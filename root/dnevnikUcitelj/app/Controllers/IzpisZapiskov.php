<?php namespace App\Controllers;

class IzpisZapiskov extends BaseController
{
	public function index(){

		$data["title"]="Izpis";


		$db = \Config\Database::connect();
		$builder="SELECT idZapisek,datumZapisek,naslovZapisek,vsebinaZapisek,imeUporabnik, priimekUporabnik, imeDijak, priimekDijak, nazivRazred FROM zapisek
			LEFT JOIN uporabnik ON Uporabnik_idUporabnik=idUporabnik
			LEFT JOIN dijak ON Dijak_idDijak=idDijak
			LEFT JOIN razred ON Razred_idRazred=idRazred;";
		$query = $db->query($builder);
		$results=$query->getResult();
		$data["zapiski"]=$results;


		echo view('header.php',$data);
		echo view('izpisZapiskov.php');
		echo view('footer.php');		
	}


	//--------------------------------------------------------------------

}
