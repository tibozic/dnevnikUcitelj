<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Login_model extends Model
{

	public function uporabnik_podatki_get($email)
	{
		$db = \Config\Database::connect();


		/*
		$builder="SELECT idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga FROM uporabnik LEFT JOIN vloga ON idVloga=Vloga_idVloga WHERE emailUporabnik LIKE '$email'";
		$query = $db->query($builder);
		$results=$query->getResult();

		*/

		$builder = $db->table('uporabnik');
		$builder->select('idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga');
		$builder->join('vloga', 'Vloga_idVloga=idVloga', 'left');
		$builder->like('emailUporabnik', $email);

		$query = $builder->get();
		$results = $query->getResult();
		return $results;
	}


}