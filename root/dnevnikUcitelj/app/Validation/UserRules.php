<?php
namespace App\Validation;
use App\Models\UciteljModel;



class UserRules{


	public function validate_user(string $str, string $fields, array $data){

		/*

			pregleda, če uporabnik obstaja, in če se geslo ujema

		*/

		$model=new UciteljModel();

		// iz baze poišče podatke uporabnika glede na email
		$user=$model->where('emailUporabnik',$data['email'])  
			->first();

		if(!$user)
			return false;
		

		// primerja geslo, če se geslo ujema vrne true
		return password_verify($data['geslo'], $user['gesloUporabnik']); 
	}	
	
}
?>
