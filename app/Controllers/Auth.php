<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }
    public function login()
    {
        if (session('id_Sadmin')) {
            return redirect()->to(site_url('home'));
        }
        return view('auth/login');
    }
    public function loginProcess()
    {
        $validate = $this->validate([

            'username_Sadmin' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',

                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',

                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();
        $query = $this->db->table('super_admin')->getWhere(['username_Sadmin' => $post['username_Sadmin']]);
        $super_admin = $query->getRow();
        if ($super_admin) {
            if (password_verify($post['password'], $super_admin->password)) {
                $params = [
                    'id_Sadmin' => $super_admin->id_Sadmin,
                    'akses' => $super_admin->akses
                ];
                session()->set($params);
                return redirect()->to(site_url('home'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('id_Sadmin');
        return redirect()->to(site_url('login'));
    }
}
