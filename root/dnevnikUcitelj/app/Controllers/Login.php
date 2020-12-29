<?php namespace App\Controllers;
use \Config\Database;
//use App\Cotrollers;

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
				$email=$_POST['email'];
				$this->setUserSession($email);
				//echo 'SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN vloga ON idVloga=Vloga_idVloga WHERE emailUporabnik='.$email;
				return redirect()->to('/public/home');
			}

		}
		return view('login',$data);
	}

	private function setUserSession($email){
		$db = \Config\Database::connect();
		$builder="SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN vloga ON idVloga=Vloga_idVloga WHERE emailUporabnik LIKE '$email'";
		$query = $db->query($builder);
		$results=$query->getResult();

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
		$data=[
			'registracija'=>true,
		];
		return view('login',$data);
	}

}



/*
array(1) { 
[0]=> object(stdClass)#71 (5) {
 ["idUporabnik"]=> string(1) "2" 
 ["imeUporabnik"]=> string(4) "test" 
 ["priimekUporabnik"]=> string(4) "test" 
 ["emailUporabnik"]=> string(14) "test@gmail.com" 
 ["nazivVloga"]=> string(9) "BrezVloge" 
} } 
*/