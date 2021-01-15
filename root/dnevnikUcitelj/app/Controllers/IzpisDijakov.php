<?php namespace App\Controllers;

class IzpisDijakov extends BaseController
{
		
	public function index(){



		$data["title"] = "Izpis dijakov";
		$data["dijaki"]=IzpisDijakov::getDijaki();



		echo view('header.php',$data);
		echo view('izpisDijakov.php');
		echo view('footer.php');
	}



	private function getDijaki(){

		/*

			Iz podatkovne baze pridobi vse dijake, ki jim je uporabnik razrednik.

		*/



		$session=session();
		$db = \Config\Database::connect();




		// need: idDijak, imeDjak, priimekDijak, Razred_idRazred

		$builder="SELECT idDijak, imeDijak, priimekDijak FROM dijak
			LEFT JOIN razred ON idRazred=Razred_idRazred
			WHERE ".$_SESSION['idUporabnik']." LIKE Razred.idRazrednik";
		$query = $db->query($builder);
		$results=$query->getResult();
		return $results;



	}
	//--------------------------------------------------------------------

}