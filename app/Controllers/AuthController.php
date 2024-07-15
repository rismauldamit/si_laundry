<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function process_login()
    {

        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password') ?? "";

        $UserModel = new UserModel();
        $DataUser = $UserModel->where('username', $username)->first();

        if ($DataUser == null) {
            return redirect()->to('/login')->with('errors', ['Username Tidak terdaftar']);
        }

        if (password_verify($password, $DataUser['password'])) {
            session()->set('username', $DataUser['username']);
            session()->set('id_user', $DataUser['id_user']);

            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login')->with('errors', ['Password Tidak Sesuai']);
    }

    public function logout()
    {
        $UserModel = new UserModel();
        return redirect()->to('/login')->with('success','berhasil Logout');
    }
}
