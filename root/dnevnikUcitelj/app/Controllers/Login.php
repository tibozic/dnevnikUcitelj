<?php namespace App\Controllers;

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
				'geslo'=>'required'
			];

			$opozorila=[
				'email'=>[
					'required'=>'Izpolnite polje Email.',
					'valid'=>'Email ni veljaven.'
				],
				'geslo'=>[
					'required'=>'Izpolnite polje Geslo.'
				]
			];

			if (! $this->validate($pravila,$opozorila)) {
				$data['validation']=$this->validator;
			}else {
				return redirect()->to("/home");
			}

		}


		return view('login',$data);
	}

}