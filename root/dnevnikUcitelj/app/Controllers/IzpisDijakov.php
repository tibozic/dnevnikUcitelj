<?php namespace App\Controllers;


use App\Models\Razred_model;

class IzpisDijakov extends BaseController
{
		
	public function index(){


		$session=session();

		$razred_model = new Razred_model();
		$idUporabnik = session()->get('idUporabnik');

		$data["title"] = "Izpis dijakov";
		$data["dijaki"]=$razred_model->razred_dijaki_get($idUporabnik);



		echo view('header.php',$data);
		echo view('izpisDijakov.php');
		echo view('footer.php');
	}
	//--------------------------------------------------------------------

}