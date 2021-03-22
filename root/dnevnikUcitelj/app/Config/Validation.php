<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\App\Validation\UserRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $registracija = 	[
				'ime'=>'required|min_length[3]|max_length[25]',
				'priimek'=>'required|min_length[3]|max_length[25]',
				'email'=>'required|valid_email|is_unique[uporabnik.emailUporabnik]',
				'geslo'=>'required|min_length[8]|max_length[50]',
				'potrdi_geslo'=>'matches[geslo]',
	];
	public $registracija_errors = [
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

}
