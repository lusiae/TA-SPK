<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SAFillter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->akses ==  '') {
            return redirect()->to(site_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->akses ==  'Super Administrator') {
            return redirect()->to(site_url('home'));
        }
    }
}
