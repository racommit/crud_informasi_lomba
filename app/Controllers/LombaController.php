<?php

namespace App\Controllers;

use App\Models\lombamodel;
use CodeIgniter\Controller;

class LombaController extends Controller
{
    protected $lombaModel;
    public function __construct()
    {
        $this->lombaModel = new lombaModel();
    }
    public function tambahlomba()
    {



        $lombaModel = new \App\Models\lombaModel();

        $data1 = [
            'event' => $this->request->getPost('event'),
            'namalomba' => $this->request->getPost('nama_lomba'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $lombaModel->insert($data1);

        $table = $this->lombaModel->orderBy('id', 'DESC')->findAll();
        // var_dump($table);die;
        $data = [
            'title' => 'Data Peserta',
            'table1' => $table
        ];

        // Cek apakah URL sebelumnya mengarah ke comingsoon
        $previousUrl = previous_url();
        if (strpos($previousUrl, '/coming-soon') !== false) {
            session()->setFlashdata('notification', [
                'type' => 'success',
                'message' => 'Data berhasil ditambahkan'
            ]);
            return $this->comingsoon();
        }

        session()->setFlashdata('notification', [
            'type' => 'success',
            'message' => 'Data berhasil ditambahkan '
        ]);
        return $this->dd();
    }

    public function delete()
    {
        $id = $_POST['id'];

        // var_dump($id);die;

        $dataLomba = $this->lombaModel->where('id', $id)->delete();

        if ($dataLomba) {
            // Cek apakah URL sebelumnya mengarah ke comingsoon
            $previousUrl = previous_url();
            if (strpos($previousUrl, '/coming-soon') !== false) {
                session()->setFlashdata('notification', [
                    'type' => 'success',
                    'message' => 'Data berhasil dihapus'
                ]);
                return $this->comingsoon();
            }

            session()->setFlashdata('notification', [
                'type' => 'success',
                'message' => 'Data berhasil dihapus '
            ]);
            return $this->dd();
        } else {
            // Cek apakah URL sebelumnya mengarah ke comingsoon
            $previousUrl = previous_url();
            if (strpos($previousUrl, '/coming-soon') !== false) {
                session()->setFlashdata('notification', [
                    'type' => 'success',
                    'message' => 'Data gagal dihapus'
                ]);
                return $this->comingsoon();
            }

            session()->setFlashdata('notification', [
                'type' => 'success',
                'message' => 'Data gagal dihapus '
            ]);
            return $this->dd();
        }
    }


    public function editlomba()
    {
        $id = $_POST['id'];
        $data1 = [

            'event' => $this->request->getPost('event2'),
            'namalomba' => $this->request->getPost('nama_lomba2'),
            'tanggal' => $this->request->getPost('tanggal2'),
            'keterangan' => $this->request->getPost('keterangan2'),
        ];
        // var_dump($data1);die;
        $dataLomba = $this->lombaModel->update($id, $data1);

        if ($dataLomba) {
            // Cek apakah URL sebelumnya mengarah ke comingsoon
            $previousUrl = previous_url();
            if (strpos($previousUrl, '/coming-soon') !== false) {
                session()->setFlashdata('notification', [
                    'type' => 'success',
                    'message' => 'Data berhasil diubah'
                ]);
                return $this->comingsoon();
            }

            session()->setFlashdata('notification', [
                'type' => 'success',
                'message' => 'Data berhasil diubah '
            ]);
            return $this->dd();
        } else {
            // Cek apakah URL sebelumnya mengarah ke comingsoon
            $previousUrl = previous_url();
            if (strpos($previousUrl, '/coming-soon') !== false) {
                session()->setFlashdata('notification', [
                    'type' => 'success',
                    'message' => 'Data gagal diubah'
                ]);
                return $this->comingsoon();
            }

            session()->setFlashdata('notification', [
                'type' => 'success',
                'message' => 'Data gagal diubah '
            ]);
            return $this->dd();
        }
    }

    public function dd(): string
    {

        $table = $this->lombaModel->where('tanggal <=', date('Y-m-d'))->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Data Peserta',
            'table1' => $table,
            'notification' => session()->getFlashdata('notification') // Ambil notifikasi dari session
        ];

        return view('now', $data);
    }

    public function comingsoon(): string
    {

        $table = $this->lombaModel->where('tanggal >', date('Y-m-d'))->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Data Peserta',
            'table1' => $table,
            'notification' => session()->getFlashdata('notification')
        ];

        return view('coming-soon', $data);
    }

    public function dd2(): string
    {

        $table = $this->lombaModel->where('tanggal <=', date('Y-m-d'))->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Data Peserta',
            'table1' => $table,
            
        ];

        return view('now', $data);
    }

    public function comingsoon2(): string
    {

        $table = $this->lombaModel->where('tanggal >', date('Y-m-d'))->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Data Peserta',
            'table1' => $table,
            
        ];

        return view('coming-soon', $data);
    }
}
