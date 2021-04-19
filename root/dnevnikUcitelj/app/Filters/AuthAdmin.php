<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Preusmeritev uporabnika, ki ni administrator (preprečitev dostopa do administartivnih funkcji)
        if(session()->get('jePrijavljen') == false || session()->get('vlogaUporabnik') != 'Administrator' && session()->get('vlogaUporabnik') != 'Ravnatelj'){
        	return redirect()->to(base_url("home"));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}