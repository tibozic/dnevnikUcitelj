<?php namespace App\Controllers;

use App\Models\UciteljModel;

class Register extends BaseController
{
	public function index()
	{
		return view('register');
	}


	public function register(){

		helper(['form']);

		if($this->request->getMethod() == 'post'){



			// pravila za registracijo uporabnika
			$pravila=[
				'ime'=>'required|min_length[3]|max_length[25]',
				'priimek'=>'required|min_length[3]|max_length[25]',
				'email'=>'required|valid_email|is_unique[uporabnik.emailUporabnik]',
				'geslo'=>'required|min_length[8]|max_length[50]',
				'potrdi_geslo'=>'matches[geslo]',
			];


			// opozorila za registracijo uporabnika
			$opozorila=[
				'ime'=>[
					'required'=>'Izpolnite polje Ime.',
					'min_length'=>'Ime mora vsebovati vsaj 3 znake.',
					'max_length'=>'Ime mora vsebovati največ 25 znakov.'
				],
				'priimek'=>[
					'required'=>'Izpolnite polje Priimek.',
					'min_length'=>'Priimek mora vsebovati vsaj 3 znake.',
					'max_length'=>'Priimek mora vsebovati največ 25 znakov.'
				],
				'email'=>[
					'required'=>'Izpolnite polje Email.',
					'is_unique'=>'Email je že uporabljen.',
					'valid_email'=>'Email ni veljaven.'
				],
				'geslo'=>[
					'required'=>'Izpolnite polje Geslo.',
					'min_length'=>'Geslo mora vsebovati vsaj 8 znakov.',
					'max_length'=>'Geslo mora vsebovati največ 50 znakov.'
				],
				'potrdi_geslo'=>[
					'matches'=>'Gesli se ne ujemata.'
				]
			];





			if(! $this->validate($pravila, $opozorila)){
				$data['validation']=$this->validator;
			}else{

				$pass=$this->request->getPost('geslo');


				// zakriptira geslo z php funkcijo in algoritmom CRYPT_BLOWFISH
				$hashed_pass=password_hash($pass, PASSWORD_BCRYPT);
				if($hashed_pass == false){  // pregleda če je kriptiranje gesla uspešno
					redirect()->to('/public/register');
				}

				$data=array(
					'imeUporabnik' => $this->request->getPost('ime'),
					'priimekUporabnik' => $this->request->getPost('priimek'),
					'emailUporabnik' => $this->request->getPost('email'),
					'gesloUporabnik' => $hashed_pass,
					'Vloga_idVloga' => 5,
				);
				
				$model=new UciteljModel(); // shrani podatke uporabnika v model
				$model->save($data); // model objavi v podatkovno bazo
				return redirect()->to('/public/login/registriran');
			}
		}


		return view('register',$data);
	}

	

	//--------------------------------------------------------------------
}


