<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Echo_;
use App\Models\Model_Mahasiswa;
use App\Models\Model_MahasiswaBobot;
use App\Models\Model_Jurusan;

class Mahasiswa extends BaseController
{
    function __construct()
    {
        $this->alternatif = new Model_Mahasiswa();
        $this->alternatifBobot = new Model_MahasiswaBobot();
        $this->jurusan = new Model_Jurusan();
    }

    public function index()
    {
        $data['alternatif'] = $this->alternatif->findAll();
        return view('mahasiswa/get', $data);
    }

    public function create()
    {
        $data['jurusan'] = $this->jurusan->findAll();
        return view('mahasiswa/add', $data);
    }

    public function tambah_Mahasiswa()
    {
        //Validasi Tambah Data
        $validate = $this->validate([
            'npm' => [
                'rules'  => 'required|is_unique[kriteria.nama_kriteria]|exact_length[9]',
                'errors' => [
                    'required' => 'NPM tidak boleh kosong.',
                    'is_unique' => 'NPM sudah ada.',
                    'exact_length' => 'NPM harus berjumlah 9 angka.',
                ],
            ],
            'nama_mahasiswa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Mahasiswa tidak boleh kosong.',

                ],
            ],
            'program_studi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Program studi tidak boleh kosong.',

                ],
            ],

            'tahun' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tahun tidak boleh kosong.',

                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }


        $data = $this->request->getPost();
        $this->db->table('alternatif')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Mahasiswa berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('alternatif')->getWhere(['id_alternatif' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['alternatif'] = $query->getRow();
                $data['jurusan'] = $this->jurusan->findAll();
                return view('mahasiswa/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_Mahasiswa($id)
    {

        //Validasi Edit Data
        $validate = $this->validate([
            'npm' => [
                'rules'  => 'required|is_unique[kriteria.nama_kriteria]|exact_length[9]',
                'errors' => [
                    'required' => 'NPM tidak boleh kosong.',
                    'is_unique' => 'NPM sudah ada.',
                    'exact_length' => 'NPM harus berjumlah 9 angka.',
                ],
            ],
            'nama_mahasiswa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Mahasiswa tidak boleh kosong.',
                ],
            ],
            'tahun' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tahun tidak boleh kosong.',
                ],
            ],
            'program_studi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Program studi tidak boleh kosong.',

                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('alternatif')->where(['id_alternatif' => $id])->update($data);
        return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Mahasiswa berhasil Diubah');
    }

    public function destroy($id)
    {

        // dd($id);
        $tes = $this->db->table('alternatif')->where(['id_alternatif' => $id])->delete();
        // dd($tes);
        return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Mahasiswa berhasil Dihapus');
    }

    public function detail($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('alternatif')->getWhere(['id_alternatif' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['alternatif'] = $query->getRow();
                return view('mahasiswa/detail', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['alternatifBobot'] = $this->alternatifBobot->getAll();
        return view('mahasiswa/detail', $data);
    }

    public function tambah_detail($id = null)
    {

        // // //Validasi Edit Data
        $validate = $this->validate([
            'bobot.*' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Sub kriteria harus dipilih.',
                ],
            ],

        ]);

        // $fields = array(
        //     "bobot.*" => "required",
        // );

        // $validationRules= array(
        //     "errors" => "Sub kriteria harus dipilih",
        // );
        // $validate = $this->validate($fields);


        if (!$validate) {
            return redirect()->back()->withInput();
        }

        if ($id != null) {
            $id_kriteria = $this->request->getPost('id_kriteria');
            $id_ba = $this->request->getPost('id_ba');
            $bobot = $this->request->getPost('bobot');
            $db = db_connect();
            $db->query("delete FROM bobot_alternatif where alternatif1='$id'");

            foreach ($id_kriteria as $key => $nb) {
                $rand[$key] = substr(uniqid('', true), -5);
                $simpan = $db->query("INSERT INTO bobot_alternatif  VALUES ('$rand[$key]', '$id_kriteria[$key]', '$id', '$bobot[$key]')");
            }
            // 
            return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Alternatif berhasil disimpan');
        }
    }
}
