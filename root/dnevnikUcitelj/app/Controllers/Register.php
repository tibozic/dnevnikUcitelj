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

			$pravila=[
				'ime'=>'required|min_length[3]|max_length[25]',
				'priimek'=>'required|min_length[3]|max_length[25]',
				'email'=>'required|valid_email|is_unique[ucitelj.emailUcitelj]',
				'geslo'=>'required|min_length[8]|max_length[50]',
				'potrdi_geslo'=>'matches[geslo]',
			];

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
				$hashed_pass=password_hash($pass, PASSWORD_BCRYPT);

				$data=array(
					'imeUporabnik' => $this->request->getPost('ime'),
					'priimekUporabnik' => $this->request->getPost('priimek'),
					'emailUporabnik' => $this->request->getPost('email'),
					'gesloUporabnik' => $hashed_pass,
					'Vloga_idVloga' => 5,
				);
				
				$model=new UciteljModel();
				$model->save($data);
				return redirect()->to('/public/login');
			}
		}


		return view('register',$data);
	}

	

	//--------------------------------------------------------------------
}


