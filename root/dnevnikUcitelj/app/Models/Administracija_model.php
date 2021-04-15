<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Administracija_model extends Model
{


	public function uporabniki_get()
	{

		$db = \Config\Database::connect();
		$builder = $db->table('uporabnik');
		$builder->select('idUporabnik,imeUporabnik,priimekUporabnik,emailUporabnik,nazivVloga');
		$builder->join('Vloga', 'Vloga_idVloga=idVloga', 'left');

		$query = $builder->get();
		$results=$query->getResult();

		return $results;
	}
}