<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\UserModel;

class EventController extends BaseController
{
    public function index()
    {
        $model = new EventModel();
        $data['events'] = $model->select('events.*, users.name as user_name')
            ->join('users', 'users.id = events.user_id')
            ->findAll();
        return view('admin/events/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('admin/events/create', $data);
    }

    public function store()
    {
        $model = new EventModel();
        $model->save([
            'user_id' => $this->request->getPost('user_id'),
            'name'    => $this->request->getPost('name'),
            'date'    => $this->request->getPost('date'),
            'location'=> $this->request->getPost('location')
        ]);

        return redirect()->to('/admin/events');
    }
}
