<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class InvoicePackageModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'invoice_package';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sku',
        'quantity',
        'category',
        'items',
        'item_full_details',
        'price',
        'created_at'
    ];

  
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;
    
    // Dates
    protected $updatedField = '';
    protected $useTimestamps = true;


     // Get total records count
    public function getTotalRecords(){
        return $this->countAll();
    }

    // Get filtered records count
    public function getFilteredRecords($searchValue){
        $builder = $this->builder();
        if (!empty($searchValue)) {
            $builder->like('id', $searchValue)
                    ->orLike('sku', $searchValue)
                    ->orLike('category', $searchValue)
                    ->orLike('items', $searchValue)
                    ->orLike('item_full_details', $searchValue)
                    ->orLike('price', $searchValue)
                    ->orLike('quantity', $searchValue);
        }
        return $builder->countAllResults();
    }

    // Get paginated and filtered data
    public function getData($start, $length, $searchValue, $orderColumn, $orderDir){
        $builder = $this->builder()
                       ->select('id, sku, quantity, category, items, item_full_details, price');

        if (!empty($searchValue)) {
            $builder->like('id', $searchValue)
                    ->orLike('sku', $searchValue)
                    ->orLike('category', $searchValue)
                    ->orLike('items', $searchValue)
                    ->orLike('item_full_details', $searchValue)
                    ->orLike('price', $searchValue)
                    ->orLike('quantity', $searchValue);
        }

        $builder->orderBy($orderColumn, $orderDir)
                ->limit($length, $start);

        return $builder->get()->getResultArray();
    }
}
