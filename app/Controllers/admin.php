<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // Pastikan bahwa hanya pengguna yang telah login (memiliki sesi 'nama') yang dapat mengakses halaman admin
        if (!session('nama')) {
            return redirect()->to(base_url('/login'));
        }

        // Lainnya, Anda dapat menampilkan tampilan atau melakukan logika bisnis untuk halaman admin
        // Contoh: Menampilkan pesan selamat datang di halaman admin
        $data = [
            'title' => 'Admin Dashboard',
            'message' => 'Welcome to the Admin Dashboard!',
            'username' => session('nama'), // Ambil data nama pengguna dari sesi
        ];

        echo view('admin', $data);
    }
}
