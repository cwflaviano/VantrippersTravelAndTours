<?php

namespace App\Controllers\Admin;

use Exception;
use App\Controllers\BaseController;
use App\Models\VantripperDb\UsersModel as users;
use App\Models\VantripperDb\AccommodationModel as accommodations;

class AccommodationController extends BaseController {

    // create accommodation, returns view and process post submits
    public function create_accommodation() {
        $user_id = session()->get('user_id');
        if(!$user_id)
            return redirect()->to('/error_page')->with('error', 'User ID is not Set');  

        try {
            $users = new users();
            $user = $users->db->query('SELECT id, first_name, last_name, email, contact FROM users WHERE id = ?', [$user_id])->getRowArray();
    
            if ($user) {
                $user_cid     = $user['id'];
                $user_email   = $user['email'];
                $user_contact = $user['contact'];
                $user_name    = $user['first_name'] . ' ' . $user['last_name'];
            } else {
                $user_name = "User not found";
            }
    
            if($this->request->getMethod() == 'POST') {
                $numEntries = count($this->request->getPost('place'));
                for($i = 0; $i < $numEntries; $i++) {
                    $room_type = $this->request->getPost('room_type')[$i] ?? '';
                    $total_rate = $this->request->getPost('total_rate')[$i] ?? '';
                    $per_head = $this->request->getPost('per_head')[$i] ?? '';
                    $season_type = $this->request->getPost('season_type')[$i] ?? 'no info';
                    $season_start_date = $this->request->getPost('season_start_date')[$i] ?? 'no info';
                    $season_end_date = $this->request->getPost('season_end_date')[$i] ?? 'no info';
                    $description = $this->request->getPost('description')[$i] ?? 'no info';
                    $remarks = $this->request->getPost('remarks')[$i] ?? 'no info';
    
                    $place = $this->request->getPost('place')[$i] ?? '';
                    $fb = $this->request->getPost('fb')[$i] ?? '';
                    $hotel_name = $this->request->getPost('hotel_name')[$i] ?? '';
                    $capacity = $this->request->getPost('capacity')[$i] ?? '';
                    $star_rating = $this->request->getPost('star_rating')[$i] ?? '';
                    $pet_friendly = $this->request->getPost('pet_friendly')[$i] ?? '';
                    $pet_fee_desc = $this->request->getPost('pet_fee_desc')[$i] ?? '';
                    $breakfast = $this->request->getPost('breakfast')[$i] ?? '';
                    $pool = $this->request->getPost('pool')[$i] ?? '';
                    $elevator = $this->request->getPost('elevator')[$i] ?? '';
                    $created_by = $this->request->getPost('created_by')[$i] ?? '';
                    $function_hall = $this->request->getPost('function_hall')[$i] ?? '';
                    $function_hall_qty = $this->request->getPost('function_hall_qty')[$i] ?? '';
                    $distance_from = $this->request->getPost('distance_from')[$i] ?? '';
                    $distance_location = $this->request->getPost('distance_location')[$i] ?? '';
                    $pin_location = $this->request->getPost('pin_location')[$i] ?? '';
                    $email = $this->request->getPost('email')[$i] ?? '';
                    $can_accommodate = $this->request->getPost('can_accommodate')[$i] ?? '';
                    $contact = $this->request->getPost('contact')[$i] ?? '';
                    $beachfront = $this->request->getPost('beachfront')[$i] ?? '';
                    $area = $this->request->getPost('area')[$i] ?? '';
    
                    // Process Pet Friendly field
                    if ($pet_friendly === "yes_with_fee") {
                        $pet_fee_desc = trim($pet_fee_desc);
                        $pet_friendly = !empty($pet_fee_desc) ? "yes, " . $pet_fee_desc : "yes";
                    } elseif ($pet_friendly === "yes_free") {
                        $pet_friendly = "yes";
                    }
    
                     // Process Function Hall field using the hidden quantity input
                    if ($function_hall === "yes") {
                        $function_hall_qty = trim($function_hall_qty);
                        $function_hall = !empty($function_hall_qty) ? "yes, " . $function_hall_qty : "yes";
                    }
    
                    $accommodations = new accommodations();
                    $accommodations->db->query("INSERT INTO accommodation ( place, fb,  hotel_name, room_type, 
                                                                            total_rate, per_head, capacity, 
                                                                            star_rating, pet_friendly, breakfast, 
                                                                            pool, elevator, remarks, 
                                                                            created_by, function_hall, distance_from, 
                                                                            distance_location, pin_location, description, 
                                                                            email, season_type, season_start_date, 
                                                                            season_end_date, can_accommodate, contact, 
                                                                            beachfront, area ) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                                                    [$place, $fb, $hotel_name, $room_type, $total_rate, $per_head, $capacity, $star_rating, $pet_friendly, $breakfast, $pool, $elevator, $remarks, $created_by, $function_hall, $distance_from, $distance_location, $pin_location, $description, $email, $season_type, $season_start_date, $season_end_date, $can_accommodate, $contact, $beachfront, $area]);              
                }
                return redirect()->to('/admin/create-accommodation?status=success');
            }
        }
        catch(Exception $e) {
            return redirect()->to('/admin/create-accommodation?status=error&message='. urlencode($e->getMessage()));
        }

        $data = [
            'title' => 'Accommodation | Admin',
            'user' => $user,
            'user_name' => $user_name,
            'user_cid' => $user_cid,
            'user_contact' => $user_contact,
            'user_email' => $user_email
        ];
        return view('admin/pages/accommodation/create_accommodation', $data);
    }

    // list accommodation, redirect to accommodation page
    public function list_accommodation() {
        
        $data = [
            'title' => 'Accommodation | Admin'
        ];
        return view('admin/pages/accommodation/list_accommodation', $data);
    }

    // search for accommodation
    public function search_accommodation() {
        $data = [
            'title' => 'Accommodation | Admin'
        ];
        return view('admin/pages/accommodation/search_accommodation', $data);
    }
}
