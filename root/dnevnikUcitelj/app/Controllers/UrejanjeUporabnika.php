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

		$db = \Config\Database::connect();

		/*
		$builder="UPDATE uporabnik SET imeUporabnik='".$_POST['ime']."', priimekUporabnik='".$_POST['priimek']."', emailUporabnik='".$_POST['email']."', Vloga_idVloga='".$_POST['vloga']."' WHERE idUporabnik=".$idUporabnik.";";

		//echo $builder;
		$query = $db->query($builder);
		$results=$query->getResult();
		*/
		
		$builder = $db->table('uporabnik');
		$builder->set('imeUporabnik', $_POST['ime']);
		$builder->set('priimekUporabnik', $_POST['priimek']);
		$builder->set('emailUporabnik', $_POST['email']);
		$builder->set('Vloga_idVloga', $_POST['vloga']);
		$builder->where('idUporabnik', $idUporabnik);
		$builder->update();





		return redirect()->to(base_url('administracija'));
	}


	

	//--------------------------------------------------------------------

}