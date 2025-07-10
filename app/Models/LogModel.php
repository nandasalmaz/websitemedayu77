<?php
namespace App\Models;
use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'log_admin';
    protected $allowedFields = ['aktivitas', 'waktu'];
    protected $useTimestamps = false;
    protected $createdField  = 'waktu';
}
