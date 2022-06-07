<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginAuthMhs implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (session()->get('isLogin')) {
			return redirect()->to('/layout/default');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
