<?php namespace App\Controllers;
use \Config\Database;

class Vnos extends BaseController
{
	public function index($idZapiska='null'){

		/*

			Ustvarjanje/urejanje zapiska

		*/

		if($idZapiska != 'null'){
			$data['podatki'] = Vnos::pridobiPodatke($idZapiska);
		}else{
			$data['podatki'] = [(object)[
				'idZapisek' => 'null',
				'naslovZapisek' => '',
				'ocenaZapisek' => 0,
				'vsebinaZapisek' => '',
				'Dijak_idDijak' => null
			]];
		}

		//$session=session();

    	$data["title"]="Vnos";


		$results=$this->izpisiDijake();
		$data["results"]=$results;
		if($this->request->getMethod() == 'post'){
			vnosZapiska($idZapiska);
		}
		echo view('header.php',$data);
		echo view('vnos.php');
		echo view('footer.php');
	}

	private function izpisiDijake(){
		
		/*

			Izpis dijakov za izbirio v dropdown menu

		*/

		$db = \Config\Database::connect();


		/*
		$builder="SELECT idDijak,imeDijak,priimekDijak,nazivRazred FROM dijak LEFT JOIN razred ON idRazred=Razred_idRazred ORDER BY Razred_idRazred";
		$query = $db->query($builder);
		$results=$query->getResult();

		*/
		
		$builder = $db->table('dijak');
		$builder->select('idDijak,imeDijak,priimekDijak,nazivRazred');
		$builder->join('razred', 'Razred_idRazred=idRazred', 'left');
		$builder->orderBy('Razred_idRazred', 'ASC');
		
		$query = $builder->get();
		$results = $query->getResult();




		return $results;
	}

	public function vnosZapiska($idZapiska='null'){

		/*

			Shrani zapisek v podatkovno bazo

		*/

		$ocena = $_POST['ocena'] ?? 0;


		$session=session();
		$db = \Config\Database::connect();

		/*
		$builder='INSERT INTO zapisek(datumZapisek, naslovZapisek, ocenaZapisek, vsebinaZapisek, Uporabnik_idUporabnik, Dijak_idDijak, Dijak_Razred_idRazred) VALUES (CURDATE(),"'.$_POST["naslov"].'","'.$_POST["ocena"].'","'.$_POST["vsebina"].'",'.$_SESSION["idUporabnik"].','.$_POST["dijak"].',(SELECT Razred_idRazred FROM dijak WHERE dijak.idDijak='.$_POST["dijak"].'));';

		$query=$db->query($builder);
		*/
		

		// pridbi id razreda, za dijaka ki ga vnašamo	
		$builder = $db->table('dijak');
		$builder->select('Razred_idRazred');
		$builder->where('dijak.idDijak', $_POST['dijak']);

		$query = $builder->get();
		$idRazred = $query->getResult()[0]->Razred_idRazred;

		//pridobi in shrani vse podatke dijaka
		$zapisekData = [
			'datumZapisek' => date('Y-m-d'), //vrne datum v formatu yyyy-mm-dd (kot CURDATE())
			'naslovZapisek' => $_POST['naslov'],
			'ocenaZapisek' => $ocena,
			'vsebinaZapisek' => $_POST['vsebina'],
			'Uporabnik_idUporabnik' => $_SESSION['idUporabnik'],
			'Dijak_idDijak' => $_POST['dijak'],
			'Dijak_Razred_idRazred' => $idRazred,
		];

		// podatke sharni v PB
		$builder = $db->table('zapisek');

		if ($idZapiska != 'null')
		{
			$builder->where('idZapisek', $idZapiska);
			$builder->update($zapisekData);
		}
		else
		{
			$builder->insert($zapisekData);
		}




		return redirect()->to(base_url().'/izpisZapiskov');
	}


	//--------------------------------------------------------------------

	private function pridobiPodatke($idZapisek){
		$db = \Config\Database::connect();
		$builder = "SELECT idZapisek, naslovZapisek, ocenaZapisek, vsebinaZapisek, Dijak_idDijak FROM zapisek WHERE idZapisek=".$idZapisek.";";
		$query = $db->query($builder);
		$results = $query->getResult();

		return $results;
	}
}
