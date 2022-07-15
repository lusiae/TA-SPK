<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class Admin extends ResourcePresenter
{
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    protected $modelName = 'App\Models\Model_Admin';

    protected $helpers = ['custom'];
    public function index()
    {
        $data['admin'] = $this->model->findAll();
        return view('admin/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        session();
        return view('admin/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        //Validasi Tambah Data
        $validate = $this->validate([
            'nama_lengkap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama lengkap tidak boleh kosong.',

                ],
            ],
            'username_Sadmin' => [
                'rules'  => 'required|is_unique[super_admin.username_Sadmin]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'is_unique' => 'Username sudah ada.',
                ],
            ],
            'akses' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Akses tidak boleh kosong',

                ],
            ],


            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',

                ],
            ],
            'konpassword' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password tidak boleh kosong.',
                    'matches' => 'Konfirmasi password tidak cocok.',

                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }


        // $data = $this->request->getPost();
        $data = [

            'id_Sadmin' => $this->request->getPost('id_Sadmin'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username_Sadmin'  => $this->request->getPost('username_Sadmin'),
            'akses' => $this->request->getPost('akses'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ];


        $this->model->insert($data);
        return redirect()->to(site_url('admin'))->with('success', 'Data Akun berhasil Disimpan');
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {

        $admin = $this->model->where('id_Sadmin ', $id)->first();
        if (is_object($admin)) {
            $data['admin'] = $admin;
            return view('admin/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //Validasi eDIT Data
        $validate = $this->validate([
            'nama_lengkap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama lengkap tidak boleh kosong.',

                ],
            ],
            'username_Sadmin' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',

                ],
            ],
            'akses' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Akses tidak boleh kosong',

                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id_Sadmin' => $this->request->getPost('id_Sadmin'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username_Sadmin'  => $this->request->getPost('username_Sadmin'),
            'akses' => $this->request->getPost('akses'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ];

        $this->model->update($id, $data);
        return redirect()->to(site_url('admin'))->with('success', 'Data Akun berhasil Diubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->where('id_Sadmin ', $id)->delete();

        return redirect()->to(site_url('admin'))->with('success', 'Data Akun berhasil Dihapus');
    }
}
