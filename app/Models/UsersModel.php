<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class UsersModel extends Model
{
    protected $table = "t_users";
    protected $primaryKey = "nia";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['nia','nama', 'password', 'role', 'is_active'];
}