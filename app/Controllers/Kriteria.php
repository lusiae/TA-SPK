<?php

namespace App\Controllers;

// use App\Models\Model_Kriteria;
use CodeIgniter\RESTful\ResourcePresenter;


class Kriteria extends ResourcePresenter
{

    // function __construct()
    // {
    //     $this->kriteria = new Model_Kriteria();
    // }

    protected $modelName = 'App\Models\Model_Kriteria';

    protected $helpers = ['custom'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['kriteria'] = $this->model->findAll();
        return view('kriteria/index', $data);
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
        return view('kriteria/new');
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
            'nama_kriteria' => [
                'rules'  => 'required|is_unique[kriteria.nama_kriteria]',
                'errors' => [
                    'required' => 'Nama kriteria tidak boleh kosong.',
                    'is_unique' => 'Nama kriteria sudah ada.',
                ],
            ],

            'bobot' => [
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
        $this->model->insert($data);
        return redirect()->to(site_url('kriteria'))->with('success', 'Data Kriteria berhasil Disimpan');
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
        $kriteria = $this->model->where('id_kriteria', $id)->first();
        if (is_object($kriteria)) {
            $data['kriteria'] = $kriteria;
            return view('kriteria/edit', $data);
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
        //Validasi Edit Data
        $validate = $this->validate([
            'nama_kriteria' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama kriteria tidak boleh kosong.',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to(site_url('kriteria'))->with('success', 'Data Kriteria berhasil Diubah');
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
        $this->model->where('id_kriteria', $id)->delete();
        return redirect()->to(site_url('kriteria'))->with('success', 'Data Kriteria berhasil Dihapus');
    }



    // function multicheck($nm, $key)
    // {


    //     $this->load->view('kriteria');
    //     if (isset($_POST['save'])) {
    //         $id_kriteria = 1;/* Pass the userid here */
    //         $aktif = $_POST['aktif'];
    //         for ($i = 0; $i < count($checkbox); $i++) {
    //             $aktif = $checkbox[$i];
    //             $this->model->multisave($id_kriteria, $aktif);/* Call the modal */
    //         }
    //         echo "Data added successfully!";
    //     }
    // }
}
