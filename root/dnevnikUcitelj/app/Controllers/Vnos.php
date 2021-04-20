<?php namespace App\Controllers;
use \Config\Database;

use App\Models\Vnos_model;

class Vnos extends BaseController
{
	public function index($idZapiska='null'){

		/*

			Ustvarjanje/urejanje zapiska

		*/

		$vnos_model = new Vnos_model();

		$session=session();
		$idUporabnik = $session->get('idUporabnik');

		if($idZapiska != 'null'){
			$data['podatki'] = $vnos_model->vnos_zapisek_podatki_get($idZapiska);
			$data['naslov'] = "Uredite star zapisek:";
			$data['gumb'] = "Shrani";
			$data['title'] = "Urejanje zapiska";
		}else{
			$data['podatki'] = [(object)[
				'idZapisek' => 'null',
				'naslovZapisek' => '',
				'ocenaZapisek' => 0,
				'vsebinaZapisek' => '',
				'Dijak_idDijak' => null,
				'predmet_idPredmet' => null
			]];
			$data["naslov"] = "Ustvarite nov zapisek:";
			$data["gumb"] = "Ustvari";
			$data["title"] = "Ustvarjanje zapiska";
		}

		//$session=session();

		$data['predmeti'] = $vnos_model->vnos_predmet_get($idUporabnik);

		$results=$vnos_model->vnos_dijaki_get($idUporabnik);
		$data["results"]=$results;
		if($this->request->getMethod() == 'post'){
			vnosZapiska($idZapiska);
		}
		echo view('header.php',$data);
		echo view('vnos.php');
		echo view('footer.php');
	}

	public function vnosZapiska($idZapiska='null'){

		/*

			Shrani zapisek v podatkovno bazo

		*/
		$session=session();
		$vnos_model = new Vnos_model();

		$idRazred = $vnos_model->vnos_dijak_razred_get($_POST['dijak']);

		$zapisekData = [
			'datumZapisek' => date('Y-m-d'), //vrne datum v formatu yyyy-mm-dd (kot CURDATE())
			'naslovZapisek' => $_POST['naslov'],
			'ocenaZapisek' => $_POST['ocena'],
			'vsebinaZapisek' => $_POST['vsebina'],
			'Uporabnik_idUporabnik' => $_SESSION['idUporabnik'],
			'Dijak_idDijak' => $_POST['dijak'],
			'Dijak_Razred_idRazred' => $idRazred,
			'predmet_idPredmet' => $_POST['predmet'],
		];

		$vnos_model->vnos_zapisek_shrani($idZapiska, $zapisekData);


		return redirect()->to(base_url().'/izpisZapiskov_moji');
	}


	//--------------------------------------------------------------------


}
