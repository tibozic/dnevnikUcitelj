<?php namespace App\Controllers;


use App\Models\Razred_model;
use App\Models\Ucitelj_model;

class Home extends BaseController
{
	public function index(){
		$session = session();
		if (! $session->get('jePrijavljen'))
		{
			return redirect()->to(base_url().'/login');
		}
		$data["title"] = "Domača stran";
		$idUporabnik = $session->get('idUporabnik');

		$podatki_razred_osnovno = new Razred_model();
		$podatki_ucitelj = new Ucitelj_model();

		$data['razred_naziv'] = $podatki_razred_osnovno->razred_naziv_get($session->get('idUporabnik'));

		if (session()->get('vlogaUporabnik') == "Razrednik" && isset($data['razred_naziv'][0]))
		{
			$idRazred = $data['razred_naziv'][0]->idRazred;
			$data['razred_osnovno'] = $podatki_razred_osnovno->razred_podatki_osnovno_get($idRazred);
			$data['razred_ocene'] = $podatki_razred_osnovno->razred_podatki_ocene_get($idRazred);
			$data['razred_ocene_pojav'] = $podatki_razred_osnovno->razred_ocene_get($idRazred);
		}

		$data['ucitelj_podatki_osnovno'] = $podatki_ucitelj->ucitelj_podatki_osnovno_get($idUporabnik);
		$data['ucitelj_podatki'] = $podatki_ucitelj->ucitelj_podatki_get($idUporabnik);
		$data['ucitelj_podatki_ocene'] = $podatki_ucitelj->ucitelj_podatki_ocene_get($idUporabnik);
		$data['ucitelj_ocene'] = $podatki_ucitelj->ucitelj_ocene_get($idUporabnik);




		echo view('header.php',$data);
		echo view('home.php');
		echo view('footer.php');
	}


	public function odjava(){
		session()->destroy();
		return redirect()->to(base_url().'/login');
	}

	//--------------------------------------------------------------------

}
