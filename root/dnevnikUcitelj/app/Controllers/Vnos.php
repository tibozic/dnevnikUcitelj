<?php namespace App\Controllers;
use \Config\Database;

class Vnos extends BaseController
{
	public function index(){
		session_start();

    	$data["title"]="Domov";
		$results=$this->izpisiDijake();
		$data["results"]=$results;
		if($this->request->getMethod() == 'post'){
				vnosZapiska();
		}
		echo view('header.php',$data);
		echo view('vnos.php');
		echo view('footer.php');
		print_r($_SESSION);
	}

	private function izpisiDijake(){
		$db = \Config\Database::connect();
		$builder="SELECT idDijak,imeDijak,priimekDijak,nazivRazred FROM dijak LEFT JOIN razred ON idRazred=Razred_idRazred ORDER BY Razred_idRazred";
		$query = $db->query($builder);
		$results=$query->getResult();
		return $results;
	}

	public function vnosZapiska(){
		//session_start();

		$builder='INSERT INTO zapisek(datumZapisek, naslovZapisek, vsebinaZapisek, Uporabnik_idUporabnik, Dijak_idDijak, Dijak_Razred_idRazred) VALUES ('.$_POST["datum"].',"'.$_POST["naslov"].'","'.$_POST["vsebina"].'",2,'.$_POST["dijak"].',(SELECT Razred_idRazred FROM dijak WHERE dijak.idDijak='.$_POST["dijak"].'));';

		//$builder="INSERT INTO zapisek(datumZapisek, naslovZapisek, vsebinaZapisek, Uporabnik:idUporabnik, Dijak_idDijak, Dijak_Razred_idRazred) VALUES (".$_POST['datum'].",".$_POST['naslov'].",".$_POST['vsebina'].",".$_SESSION['idUporabnik'].",".$_POST['dijak']."(SELECT Razred_idRazred FROM dijak WHERE dijak.idDijak=".$_POST['idDijak']."));';

		return;
	}

	//--------------------------------------------------------------------

}
