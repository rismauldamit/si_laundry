<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\TestStatus\Success;

class UserController extends BaseController
{
    public function index()
    {
        $UserModel = new UserModel();
        $listuser = $UserModel->findAll();
        return view('user', [
            'listuser' => $listuser
        ]);
    }
    public function tambah()
    {
        if (!$this->validate([ //validasi dari form post
            'username' => 'required|alpha',
            'password' => 'required|min_length[6]',
            'role' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // validasi Selesai
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password') ?? '', PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ];
        // memanggil model UserModel
        $UserModel = new UserModel();
        // insert data ke tabel user
        $UserModel->insert($data);
        return redirect()->to('/user')->with('success', 'Data User Berhasil Ditambahkan');
    }
}
