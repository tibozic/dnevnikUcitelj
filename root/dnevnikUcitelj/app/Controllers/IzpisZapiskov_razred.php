<?php namespace App\Controllers;


use App\Models\Zapisek_model;

class IzpisZapiskov_razred extends BaseController
{
	public function index(){
		$session=session();

		$zapisek_model = new Zapisek_model();
		$idUporabnik = session()->get('idUporabnik');

		$data["title"]="Izpis zapiskov razreda";

		$data['zapiski'] = $zapisek_model->zapiski_razred_get($idUporabnik);


		echo view('header.php',$data);
		echo view('izpisZapiskov_razred.php');
		echo view('footer.php');		
	}



}
