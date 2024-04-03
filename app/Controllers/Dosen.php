<?php

namespace App\Controllers;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    public function index()
    {

        $DataDosen = new DosenModel();
        $data = array(

            'DataDosen' => $DataDosen->findAll(),
            
        );
        $judul['title']='Data Dosen';
        echo view('layout/header', $judul);
        echo view('layout/sidebar', $judul);
        echo view('dosen', $data);
        echo view('layout/footer');

    }

    public function tambah()
    {
        $dosenModel = new DosenModel();

        // Receive data from the form
        $kode_dosen = $this->request->getPost('kode_dosen');
        $nama_dosen = $this->request->getPost('nama_dosen');
        $status_dosen = $this->request->getPost('status_dosen');

        // Insert data into the database
        $data = [
            'kode_dosen' => $kode_dosen,
            'nama_dosen' => $nama_dosen,
            'status_dosen' => $status_dosen
        ];
        
        // Validasi data
        if (!$kode_dosen || !$nama_dosen || !$status_dosen) {
            return redirect()->back()->withInput()->with('error', 'All fields are required');
        }

        $token = getenv('TELEGRAM_BOT_TOKEN');
 
		$datas = [
		'text' =>"data berhasil ditambahkan dengan nama dosen $nama_dosen ",
		'chat_id' => getenv('TELEGRAM_CHAT_ID')  //contoh bot, group id -1002104421632
		];
       
		file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas));

        // Insert the data
        $dosenModel->insert($data);

        // Redirect back to dosen with success message
        return redirect()->to('/dosen')->with('success', 'Data added successfully');
    }

    public function update($id)
    {
        $dosenModel = new DosenModel();

        // Receive data from the form
        $kode_dosen = $this->request->getPost('kode_dosen');
        $nama_dosen = $this->request->getPost('nama_dosen');
        $status_dosen = $this->request->getPost('status_dosen');

        // Update data in the database
        $data = [
            'kode_dosen' => $kode_dosen,
            'nama_dosen' => $nama_dosen,
            'status_dosen' => $status_dosen
        ];
        
        // Update the data
        $dosenModel->update($id, $data);

        // Redirect back to dashboard with success message
        return redirect()->to('/dosen')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $dosenModel = new DosenModel();

        // Delete data from the database
        $dosenModel->delete($id);

        // Redirect back to dashboard with success message
        return redirect()->to('/dosen')->with('success', 'Data deleted successfully');
    }

}
