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
        $header['title']='Data Dosen';
        echo view('layout/header', $header);
        echo view('layout/sidebar');
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
