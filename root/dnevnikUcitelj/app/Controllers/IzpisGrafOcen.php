<?php namespace App\Controllers;

class IzpisGrafOcen extends BaseController
{
	public function index($idDijak){
		$data["title"] = "Ocene dijaka";
		$data["ocene"] = IzpisGrafOcen::pridobiOcene($idDijak);



		echo view('header.php',$data);
		echo view('izpisGrafOcen.php');
		echo view('footer.php');
	}

	private function pridobiOcene($idDijak){

		/*

			Iz podatkovne baze pridobi podatke o zapiskih(datum, ocena), ki vsebujejo dijaka in jih vrne.

		*/



		$session=session();
		$db = \Config\Database::connect();


		/*
		$builder = "SELECT ocenaZapisek, datumZapisek, naslovZapisek, idZapisek FROM zapisek WHERE Dijak_idDijak=".$idDijak;


		$query = $db->query($builder);
		$results=$query->getResult();

		*/


		$builder = $db->table('zapisek');
		$builder->select('AVG(ocenaZapisek) AS ocenaZapisek, datumZapisek, naslovZapisek, idZapisek');
		$builder->where('Dijak_idDijak', $idDijak);
		$builder->groupBy('datumZapisek');

		$query = $builder->get();
		$results = $query->getResult();



		return $results;

	}

	//--------------------------------------------------------------------

}