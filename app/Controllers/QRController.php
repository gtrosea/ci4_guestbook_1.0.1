<?php
namespace App\Controllers;

use App\Models\GuestModel;
use Endroid\QrCode\Builder\Builder;

class QRController extends BaseController
{
    public function generate($id)
    {
        $model = new GuestModel();
        $guest = $model->find($id);
        if(!$guest) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $url = base_url('checkin/'.$guest['id']);
        $result = Builder::create()
            ->data($url)
            ->size(300)
            ->margin(10)
            ->build();

        return $this->response->setHeader('Content-Type', $result->getMimeType())
                              ->setBody($result->getString());
    }

    public function scan()
    {
        return view('qr/scan');
    }

    public function checkin($id)
    {
        $model = new GuestModel();
        $guest = $model->find($id);
        if(!$guest) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        return view('qr/greeting', ['guest' => $guest]);
    }
}
