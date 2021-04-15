<?php namespace App\Controllers;

use App\Models\Zapisek_model;

class IzpisZapiskov_moji extends BaseController
{
	public function index(){
		$session=session();


		$zapisek_model = new Zapisek_model();
		$idUporabnik = session()->get('idUporabnik');

		$data["title"]="Izpis mojih zapiskov";


		$data['zapiski'] = $zapisek_model->zapiski_uporabnik_get($idUporabnik);


		echo view('header.php',$data);
		echo view('izpisZapiskov_moji.php');
		echo view('footer.php');		
	}





}
