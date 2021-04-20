<?php namespace App\Controllers;

use App\Models\Uporabnik_model;

class UrejanjeUporabnika extends BaseController
{
	public function index($idUporabnik){

		/*

			Omogoča urejanje posameznega uporabnika

		*/


		$session=session();


		$uporabnik_model = new Uporabnik_model();
		$data["uporabnik"]=$uporabnik_model->uporabnik_podatki_get($idUporabnik);
;



		$data["vloge"]=$uporabnik_model->vloga_get();



		$data['title']="Urejanje uporabnika";
		$data['idUporabnik']=$idUporabnik;


		echo view('header',$data);
		echo view('urejanjeUporabnika');
		echo view('footer');
	}

	public function shrani($idUporabnik){

		/*

			V podatkovno bazo shrani posodobljene podatke uporabnika

		*/

		$uporabnik_model = new Uporabnik_model();
		
		$podatki = [
			'ime' => $_POST['ime'],
			'priimek' => $_POST['priimek'],
			'email' => $_POST['email'],
			'vloga' => $_POST['vloga'],
			'uporabnik' => $idUporabnik,
		];

		$uporabnik_model->uporabnik_shrani($podatki);


		return redirect()->to(base_url('administracija'));
	}


	

	//--------------------------------------------------------------------

}