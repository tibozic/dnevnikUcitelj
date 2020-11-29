<?php namespace App\Controllers;
use \Config\Database;

class Vnos extends BaseController
{
	public function index(){
		//$session=session();
		$db = \Config\Database::connect();

    	$data["title"]="Vnos";
		$results=$this->izpisiDijake();
		$data["results"]=$results;
		if($this->request->getMethod() == 'post'){
			vnosZapiska();
		}
		echo view('header.php',$data);
		echo view('vnos.php');
		echo view('footer.php');
	}

	private function izpisiDijake(){
		$db = \Config\Database::connect();
		$builder="SELECT idDijak,imeDijak,priimekDijak,nazivRazred FROM dijak LEFT JOIN razred ON idRazred=Razred_idRazred ORDER BY Razred_idRazred";
		$query = $db->query($builder);
		$results=$query->getResult();
		return $results;
	}

	public function vnosZapiska(){
		$session=session();
		$db = \Config\Database::connect();

		$builder='INSERT INTO zapisek(datumZapisek, naslovZapisek, vsebinaZapisek, Uporabnik_idUporabnik, Dijak_idDijak, Dijak_Razred_idRazred) VALUES (CURDATE(),"'.$_POST["naslov"].'","'.$_POST["vsebina"].'",'.$_SESSION["idUporabnik"].','.$_POST["dijak"].',(SELECT Razred_idRazred FROM dijak WHERE dijak.idDijak='.$_POST["dijak"].'));';

		$query=$db->query($builder);

		return redirect()->to('/public/vnos');
	}

	//--------------------------------------------------------------------

}
