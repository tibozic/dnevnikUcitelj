<?php
namespace App\Validation;
use App\Models\UciteljModel;



class UserRules{
	public function validate_user(string $str, string $fields, array $data){
		$model=new UciteljModel();
		$user=$model->where('emailUporabnik',$data['email'])
			->first();

	if(!$user)
		return false;
	
	return password_verify($data['geslo'], $user['gesloUporabnik']);
	}	
	
}
?>
