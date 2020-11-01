<?php namespace App\Controllers;
use App\Models\UciteljModel;

class Login extends BaseController
{
	public function index()
	{		
		return view('login');
	}

	//--------------------------------------------------------------------

	public function login(){
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$pravila=[
				'email'=>'required|valid_email',
				'geslo'=>'required|min_length[8]|max_length[50]|validate_user[email,geslo]'
			];

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

			if (! $this->validate($pravila,$opozorila)) {
				$data['validation']=$this->validator;
			}else {
				$model=new UciteljModel();
				$user=$model->where('emailUporabnik',$this->request->getVar('emailUporabnik'))
							->first();
				echo $user;
				$this->setUserSession($user);
				return redirect()->to('home');

			}

		}
		return view('login',$data);
	}

	private function setUserSession($user){
		$data=[
			'idUporabnik'=>$user['idUporabnik'],
			'imeUporabnik'=>$user['imeUporabnik'],
			'priimekUporabnik'=>$user['priimekUporabnik'],
			'emailUporabnik'=>$user['emailUporabnik'],
			'vlogaUporabnik'=>$user['Vloga_idVloga'],
			'jePrijavljen'=>true,
		];

		session()->set($data);
		return true;
	}

}
