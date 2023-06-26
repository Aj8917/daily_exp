<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpencesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'expences';
    protected $primaryKey       = 'item_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['item_name','InsertDate','price'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    public function load_master_data($start_date, $end_date)
    {
      
        return 
            $this->where('InsertDate >', date('Y-m-d', strtotime($start_date)))
            ->where('InsertDate <', date('Y-m-d', strtotime($end_date)))
            ->orderBy('InsertDate', 'ASC')
            ->findAll();
    }
    
}
