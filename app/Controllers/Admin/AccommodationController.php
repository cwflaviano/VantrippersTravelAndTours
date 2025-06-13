<?php

namespace App\Controllers\Admin;

use Exception;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AccommodationController extends BaseController{

    public function create_accommodation() {
        $data = [
            'title' => 'Add Accommodation | Admin'
        ];
        return view('admin/pages/accommodation/create_accommodation', $data);
    }
}
