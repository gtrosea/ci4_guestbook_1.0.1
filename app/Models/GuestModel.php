<?php
namespace App\Models;
use CodeIgniter\Model;

class GuestModel extends Model {
    protected $table = 'guests';
    protected $allowedFields = [
        'event_id','name','phone','email','city','relation','status','invite_quota'
    ];
}
