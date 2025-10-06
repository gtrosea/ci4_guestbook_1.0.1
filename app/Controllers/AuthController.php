<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
        return redirect()->to('/dashboard');
    }

    return view('auth/login');
    }


    public function doLogin()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'name'      => $user['name'],
                'role'      => $user['role'],
                'timezone'  => $user['timezone'],
                'logged_in' => true,
            ]);

            return redirect()->to('/dashboard');

        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
