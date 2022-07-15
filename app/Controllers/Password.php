<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class Password extends ResourcePresenter
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
        return view('password/get', $data);
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
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        //
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
        // $password = $this->input->post('password');
        // $passwordBaru = $this->input->post('passwordBaru');
        // $passwordKonf = $this->input->post('passwordKonf');

        // if ($id != null) {
        //     $query = $this->db->table('super_admin')->getWhere(['id_Sadmin ' => $id]);
        //     if ($query->resultID->num_rows > 0) {
        //         $data['super_admin'] = $query->getRow();
        //         return view('password/edit', $data);
        //     } else {
        //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        //     }
        // } else {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // }
        // $admin = $this->model->where('id_Sadmin ', $id)->first();
        // if (is_object($admin)) {
        //     $data['admin'] = $admin;
        //     return view('password/edit', $data);
        // } else {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // }


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

            'password_lama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password lama tidak boleh kosong',

                ],
            ],
            'password_baru' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password baru tidak boleh kosong',

                ],
            ],
            'passwordKonf' => [
                'rules'  => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'Konfirmasi password tidak boleh kosong.',
                    'matches' => 'Konfirmasi password tidak cocok.',

                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        // $iduser = $this->request->getPost('id_admin');
        $passwordasli = $this->request->getPost('password_asli');
        $passwordlama = $this->request->getPost('password_lama');
        $passwordbaru = $this->request->getPost('password_baru');
        $passwordKonf = $this->request->getPost('passwordKonf');
        $passenkrip =  password_hash($passwordbaru, PASSWORD_BCRYPT);


        $data = [
            // '' =>  $id = $this->request->getPost('id_admin');
            'password' => password_hash($passwordbaru, PASSWORD_BCRYPT)
        ];

        $this->model->update($id, $data);
        return redirect()->to(site_url('password'))->with('success', 'Password berhasil Diubah');
        // simpan

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
        //
    }
}
