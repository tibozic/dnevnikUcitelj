<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UciteljModel extends Model
{
	protected $table='uproabnik';
	protected $primatyKey='idUporabnik';

	protected $allowedFields=['imeUporabnik','priimekUporabnik','emailUporabnik','gesloUporabnik','Vloga_idVloga'];

	//protected $validationRules=['registracija'];
	//protected $validationMessages=['registracija_errors'];
	//protected $skipValidation=false;

}