<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $UserModel = new UserModel();
        $list_user = $UserModel->findAll();
        return view('user', [
            'list_user' => $list_user
        ]);
    }

    public function simpan()
    {
        $UserModel = new UserModel();

        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'required|min_length[8]|max_length[20]',
            'role' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password') ?? "", PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];

        $UserModel->insert($data);
        return redirect()->to('/user')->with('success', 'Data User Berhasil Ditambahkan');
    }

    public function update()
    {
        $UserModel = new UserModel();

        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[20]',
            'role' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];

        if ($this->request->getPost('password') != null) {
            $data['password'] = password_hash($this->request->getPost('password') ?? '', PASSWORD_DEFAULT);
        }

        $UserModel->update($this->request->getPost('id_user'), $data);
        return redirect()->to('/user')->with('success', 'Data User Berhasil Diubah');
    }

    public function hapus()
    {
        $UserModel = new UserModel();
        $UserModel->delete($this->request->getPost('id_user'));
        return redirect()->to('/user')->with('success', 'Data User Berhasil Dihapus');
    }
}
