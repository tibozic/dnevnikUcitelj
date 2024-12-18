<?php namespace App\Controllers;
use \Config\Database;
//use App\Cotrollers;
use App\Models\Login_model;

class Login extends BaseController
{
	public function index()
	{		
		return view('login');
	}

	//--------------------------------------------------------------------

	public function login(){

		/*

			Prijava uporabnika

		*/


		helper(['form']);

		if($this->request->getMethod() == 'post'){



			// pravila za prijavo uporabnika
			$pravila=[
				'email'=>'required|valid_email',
				'geslo'=>'required|validate_user[email,geslo]',
				// validate_user -> (App/Validation/UserRules)
			];



			// opozorila za prijavo uporabnika
			$opozorila=[
				'email'=>[
					'required'=>'Izpolnite polje Email.',
					'valid'=>'Email ni veljaven.'
				],
				'geslo'=>[
					'required'=>'Izpolnite polje Geslo.',
					'validate_user'=>'Email ali Geslo se ne ujemata.'
				]
			];

			if (! $this->validate($pravila,$opozorila)) { // primerja uporabnikove vnose z pravilo
				$data['validation']=$this->validator; // če pravila ne veljajo, vrne napako
			}else {
				$email=$_POST['email'];
				$this->uporabnikPrijava($email); // kliče funkcijo, ki začne uporabnikovo sejo

				return redirect()->to(base_url().'/home');
			}

		}
		return view('login',$data);
	}

	private function uporabnikPrijava($email){

		/*
		
			Iz baze podatkov najde uporabnika in začne njegovo sejo

		*/


		$prijavni_model = new Login_model();

		$results = $prijavni_model->uporabnik_podatki_get($email);


		$data=[
			'idUporabnik'=>$results[0]->idUporabnik,
			'imeUporabnik'=>$results[0]->imeUporabnik,
			'priimekUporabnik'=>$results[0]->priimekUporabnik,
			'emailUporabnik'=>$results[0]->emailUporabnik,
			'vlogaUporabnik'=>$results[0]->nazivVloga,
			'jePrijavljen'=>true,
		];

		session()->set($data);
		return true;
	}

	public function registriran(){

		// če je bil uporabnik ravnokar registriran, vrne sporočilo "uspešno"

		$data=[
			'registracija'=>true,
		];
		return view('login',$data);
	}

}

