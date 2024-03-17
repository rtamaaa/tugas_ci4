<?php 

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model 
{
    
    // nama Table
    protected $table = "dosen";
    protected $primaryKey = 'id_dosen';

    // allowed table
    protected $allowedFields = [
        'kode_dosen',
        'nama_dosen',
        'status_dosen'
    ];
}