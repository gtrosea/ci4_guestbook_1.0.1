<?php
namespace App\Controllers;

use App\Models\GuestModel;
use CodeIgniter\Controller;

class GuestController extends BaseController
{
    public function index()
    {
        $model = new GuestModel();
        $data['guests'] = $model->findAll();
        return view('guests/index', $data);
    }

    public function create()
    {
        return view('guests/create');
    }

    public function store()
    {
        $model = new GuestModel();
        $model->save($this->request->getPost());
        return redirect()->to('/guests');
    }
}
