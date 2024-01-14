<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class MahasiswaController extends Controller
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new mahasiswaModel();
    }
    public function tambah()
    {
        // Validasi data yang dikirim dari formulir
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_mahasiswa' => 'required',
            'kelas' => 'required',
            'nama_lomba' => 'required',
            'kategori' => 'required',
            'juara' => 'required'
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Jika validasi sukses, simpan data ke database (gunakan model untuk ini)
            $mahasiswaModel = new \App\Models\MahasiswaModel();

            $data = [
                'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                'kelas' => $this->request->getPost('kelas'),
                'nama_lomba' => $this->request->getPost('nama_lomba'),
                'kategori' => $this->request->getPost('kategori'),
                'juara' => $this->request->getPost('juara'),
            ];

            $mahasiswaModel->insert($data);

            $table = $this->mahasiswaModel->orderBy('id', 'DESC')->findAll();
            $data1 = [
                'title' => 'Data Peserta',
                'table' => $table
            ];
            // Setelah menyimpan, redirect ke halaman utama atau ke halaman yang sesuai
            return view('data-mahasiswa', $data1);
        } else {
            // Jika validasi gagal, kembali ke halaman formulir
            return view('data-mahasiswa', ['validation' => $validation]);
        }
    }
    public function edit()
    {
        // Validasi data yang dikirim dari formulir
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_mahasiswa' => 'required',
            'kelas' => 'required',
            'nama_lomba' => 'required',
            'kategori' => 'required',
            'juara' => 'required'
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Jika validasi sukses, simpan data ke database (gunakan model untuk ini)
            $mahasiswaModel = new \App\Models\MahasiswaModel();

            $data = [
                'id' => $this->request->getPost('id'),
                'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                'kelas' => $this->request->getPost('kelas'),
                'nama_lomba' => $this->request->getPost('nama_lomba'),
                'kategori' => $this->request->getPost('kategori'),
                'juara' => $this->request->getPost('juara'),
            ];

            $mahasiswaModel->update($data["id"], $data);

            $table = $this->mahasiswaModel->orderBy('id', 'DESC')->findAll();
            $data1 = [
                'title' => 'Data Peserta',
                'table' => $table
            ];
            // Setelah menyimpan, redirect ke halaman utama atau ke halaman yang sesuai
            return view('data-mahasiswa', $data1);
        } else {
            // Jika validasi gagal, kembali ke halaman formulir
            return view('halaman_utama', ['validation' => $validation]);
        }
    }

    public function delete()
    {
        // Validasi data yang dikirim dari formulir

        $data = [
            'id' => $this->request->getPost('id'),
        ];
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $mahasiswaModel->where('id', $data["id"])->delete();

        $table = $this->mahasiswaModel->orderBy('id', 'DESC')->findAll();
        $data1 = [
            'title' => 'Data Peserta',
            'table' => $table
        ];
        // Setelah menyimpan, redirect ke halaman utama atau ke halaman yang sesuai
        return view('data-mahasiswa', $data1);
    }


    public function data(): string
    {

        $table = $this->mahasiswaModel->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Data Peserta',
            'table' => $table
        ];
        return view('data-mahasiswa', $data);
    }
    public function dd(): string
    {

        $table = $this->mahasiswaModel->orderBy('id', 'DESC')->findAll();
        

        $data = [
            'title' => 'Data Peserta',
            'table' => $table,
            
        ];

        return view('dashboard', $data);
    }
}
