<?php

namespace App\Controllers;

use App\Models\Model_Sbkriteria;
use App\Models\Model_Kriteria;
use CodeIgniter\RESTful\ResourceController;

class Sbkriteria extends ResourceController
{

    protected $helpers = ['custom'];

    function __construct()
    {
        $this->kriteria = new Model_Kriteria();
        $this->sbkriteria = new Model_Sbkriteria();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['sbkriteria'] = $this->sbkriteria->getAll();
        return view('sbkriteria/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['kriteria'] = $this->kriteria->findAll();
        return view('sbkriteria/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //Validasi Edit Data
        $validate = $this->validate([
            'nama_sub' => [
                'rules'  => 'required|is_unique[subkriteria.nama_sub]',
                'errors' => [
                    'required' => 'Nama Sub kriteria tidak boleh kosong.',
                    'is_unique' => 'Nama Sub kriteria sudah ada.',

                ],
            ],

            'id_kriteria'   => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama kriteria belum dipilih.',
                ],
            ],
            'bobot_sb'  => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Bobot belum dipilih.',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $this->sbkriteria->insert($data);
        return redirect()->to(site_url('sbkriteria'))->with('success', 'Data Sub Kriteria berhasil Disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $sbkriteria = $this->sbkriteria->find($id);
        if (is_object($sbkriteria)) {
            $data['sbkriteria'] = $sbkriteria;
            $data['kriteria'] = $this->kriteria->findAll();
            return view('sbkriteria/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //Validasi Edit Data
        $validate = $this->validate([
            'nama_sub' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Sub kriteria tidak boleh kosong.',
                ],
            ],
            'id_kriteria'   => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama kriteria belum dipilih.',
                ],
            ],
            'bobot_sb'  => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Bobot belum dipilih.',
                ],
            ],

        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }


        $data = $this->request->getPost();
        $this->sbkriteria->update($id, $data);
        return redirect()->to(site_url('sbkriteria'))->with('success', 'Data Sub Kriteria berhasil Diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->sbkriteria->where('id_Skriteria', $id)->delete();
        return redirect()->to(site_url('sbkriteria'))->with('success', 'Data Sub Kriteria berhasil Dihapus');
    }
}
