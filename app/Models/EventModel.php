<?php
namespace App\Models;
use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $allowedFields = ['user_id','name','date','location'];
}
