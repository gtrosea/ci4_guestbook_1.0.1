<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $data = [
            'title' => 'Daftar Users',
            'users' => $this->userModel->findAll()
            ];
        return view('admin/users/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }
        
        $data['title'] = 'Tambah User';
        return view('admin/users/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[admin,user]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->userModel->insert([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->to('/users')->with('error', 'User tidak ditemukan');
        }

        $data = [
            'title' => 'Edit User: ' . $user['name'],
            'user'  => $user
            ];
        return view('admin/users/edit', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->to('/users')->with('error', 'User tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'     => 'required|min_length[3]',
            'email'    => "required|valid_email|is_unique[users.email,id,{$id}]",
            'role'     => 'required|in_list[admin,user]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $updateData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];

        if ($this->request->getPost('password')) {
            $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to('/users')->with('success', 'User berhasil diperbarui');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $this->userModel->delete($id);

        return redirect()->to('/users')->with('success', 'User berhasil dihapus');
    }
}