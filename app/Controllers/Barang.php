<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/login");
        }

        $barang = $this->barangModel->orderBy('id', 'desc')->findAll();
        $data = [
            'barang' => $barang
        ];
        echo view('barang', $data);
    }

    public function tambah()
    {
        $data = [
            "nama" => $this->request->getPost("nama"),
            "netto" => $this->request->getPost("netto"),
            "stok" => $this->request->getPost("stok"),
            "harga" => $this->request->getPost("harga"),
            "hargaKulak" => $this->request->getPost("hargaKulak")
        ];

        $this->barangModel->insert($data);

        $data["id"] = $this->barangModel->getInsertID();

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->request->getPost("id");
        $this->barangModel->delete($id);
        echo json_encode("");
    }

    public function edit($id)
    {
        $barang = $this->barangModel->find($id);

        if ($barang) {
            return json_encode($barang);
        } else {
            return json_encode(['error' => 'Barang not found']);
        }
    }

    public function update()
    {
        $data = [
            "id" => $this->request->getPost("editId"),
            "nama" => $this->request->getPost("editNama"),
            "netto" => $this->request->getPost("editNetto"),
            "stok" => $this->request->getPost("editStok"),
            "harga" => $this->request->getPost("editHarga"),
            "hargaKulak" => $this->request->getPost("editHargaKulak")
        ];

        $this->barangModel->update($data['id'], $data);

        echo json_encode($data);
    }
}
