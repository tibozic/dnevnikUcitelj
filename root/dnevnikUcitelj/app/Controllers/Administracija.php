<?php namespace App\Controllers;

use App\Models\Administracija_model;

class Administracija extends BaseController
{
	public function index(){

		/*

			Prikaz in urejanje vseh uporabnikov

		*/


		$session=session();

		$administracija_model = new Administracija_model();


		$data["title"]="Administracija";


		$results = $administracija_model->uporabniki_get();
		$data["uporabniki"] = $results;





		echo view("header.php",$data);
		echo view("administracija.php");
		echo view("footer.php");
	}


	//--------------------------------------------------------------------

}
