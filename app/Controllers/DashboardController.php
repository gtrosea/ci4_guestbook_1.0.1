<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Dashboard'];

        if (session()->get('role') === 'admin') {
            return view('dashboard/admin', $data);
        } else {
            return view('dashboard/user', $data);
        }
    }
}
