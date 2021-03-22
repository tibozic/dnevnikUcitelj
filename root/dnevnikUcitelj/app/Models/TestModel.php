<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class TestModel extends Model
{
	protected $db;

	public function __construct(ConnectionInterface &$db){
		$this->db =& $db;
	}

	function vsiUporabniki(){
		$builder=$this->db->table('uporabniki');
		$builder->join('imeUporabnik','priimekUporabnik');
		$uporabniki=$builder->get()->getResult();
		return $uporabniki;
	}
}