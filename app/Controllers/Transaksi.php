<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->findAll();

        return view('/transaksi', $data);
    }

    public function create()
    {
        $barangModel = new BarangModel();
        $data['barang'] = $barangModel->findAll();

        return view('/tambahtransaksi', $data);
    }

    public function store()
    {
        $transaksiModel = new TransaksiModel();
        $userModel = new UserModel();
        $barangModel = new BarangModel();

        $data = [
            'idBarang' => $this->request->getPost('idBarang'),
            'nama' => $this->request->getPost('nama'),
            'netto' => $this->request->getPost('netto'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => date('Y-m-d H:i:s'),
            'user' => session()->get('nama')
        ];

        // Retrieve product details based on selected ID
        $selectedProduct = $barangModel->find($data['idBarang']);

        // Calculate total based on product price and quantity
        $data['harga'] = $selectedProduct['harga'];
        $data['netto'] = $selectedProduct['netto'];
        $data['total'] = $selectedProduct['harga'] * $data['jumlah'];

        $data['user'] = session()->get('nama');

        $transaksiModel->insert($data);

        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->delete($id);

        return redirect()->to('/transaksi');
    }
}
