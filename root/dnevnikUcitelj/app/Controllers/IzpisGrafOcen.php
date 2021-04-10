<?php namespace App\Controllers;

use App\Models\Dijak_model;

class IzpisGrafOcen extends BaseController
{
	public function index($idDijak){
		$data["title"] = "Podatki dijaka";

		$podatki_dijak = new Dijak_model();


		$data['dijak'] = $podatki_dijak->dijak_podatki_osnovno_get($idDijak);

		$idRazred = ($data['dijak'])[0]->Razred_idRazred;

		$data["ocene"] = $podatki_dijak->dijak_ocene_get($idDijak);
		$data['ocene_osnovno'] = $podatki_dijak->dijak_ocene_osnovno_get($idDijak, $idRazred);
		$data["dijak_ocene"] = $podatki_dijak->dijak_ocene2_get($idDijak);


		echo view('header.php',$data);
		echo view('izpisGrafOcen.php');
		echo view('footer.php');
	}

	//--------------------------------------------------------------------

}