<?php

namespace App\Controllers\Admin;

use Exception;
use App\Controllers\BaseController;

use App\Models\VantripperDb\UsersModel as users;
use App\Models\VantripperDb\DepartmentsModel as departments;
use App\Models\VantripperDb\RolesModel as roles;
use CodeIgniter\Database\Query;

class UserManagementController extends BaseController
{
    ## Render users management table
    public function users(){
        $filter = ($this->request->getGet('filter')) ? $this->request->getGet('filter'): 'active';
        $statusFilter = ($this->request->getGet('status')) ? $this->request->getGet('status'): null;
        $archivedCondition = ($filter === 'archived') ? 'u.user_archived = 1' : 'u.user_archived = 0';
        $statusCondition = is_numeric($statusFilter) ? " AND u.status = {$statusFilter}" : "";

        // get all users with filters
        $user = new users();
        $users = $user->db->query("   SELECT u.id, emp_id, first_name, middle_name, last_name, gender, email, contact, position, type_of_contract, d.name as department_name, r.name as role_name, status, user_archived
                                                    FROM users u
                                                    JOIN departments d ON u.department_id = d.id 
                                                    JOIN roles r ON u.role_id = r.id
                                                    WHERE u.user_delete = 0 
                                                    AND {$archivedCondition}{$statusCondition}
                                            ")->getResultArray();
        // get all departments
        $deparment = new departments();
        $departments = $deparment->db->query("SELECT id, name FROM departments")->getResultArray();
        // get all roles
        $role = new roles();
        $roles = $role->db->query("SELECT id, name FROM roles")->getResultArray();

        $data = [
            'title' => 'User Management | Admin',
            'filter' => $filter,
            'statusFilter' => $statusFilter,
            'archivedCondition' => $archivedCondition,
            'statusCondition' => $statusCondition,
            'departments' => $departments,
            'roles' => $roles,
            'users' => $users
        ];
        return view('admin/pages/user_management/users', $data);
    }

    ## Create user function
    public function create_user() {
        if($this->request->getMethod() !== 'POST') {
            return redirect()->back();
        }

        try {
            $first_name = $this->request->getPost('first_name'); 
            $middle_name = $this->request->getPost('middle_name'); 
            $last_name = $this->request->getPost('last_name'); 
            $gender = $this->request->getPost('gender'); 
            $birthdate = $this->request->getPost('birthdate'); 
            $age = $this->request->getPost('age'); 
            $position = $this->request->getPost('position'); 
            $contact = $this->request->getPost('contact'); 
            $address = $this->request->getPost('address'); 
            $email = $this->request->getPost('email'); 
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $type_of_contract = $this->request->getPost('type_of_contract'); 
            $date_of_joining = $this->request->getPost('date_of_joining'); 
            $department_id = $this->request->getPost('department_id'); 
            $role_id = $this->request->getPost('role_id'); 
            $status = $this->request->getPost('status'); 

            $users = new users();
            $row = $users->db->query('SELECT MAX(id) AS max_id FROM users')->getRow();
            $next_id = $row->max_id + 1;
            $emp_id = 'EMP_' . str_pad($next_id, 4, '0', STR_PAD_LEFT);

            // Handle file upload
            $profile_picture = $this->request->getFile('profile_picture');
            if ($profile_picture && $profile_picture->isValid() && !$profile_picture->hasMoved()) {
                $target_dir = ROOTPATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'profile_picture';
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true); // Use 0755 for better security
                }
                $file_name = $profile_picture->getRandomName(); // Generates a unique name
                if ($profile_picture->move($target_dir, $file_name)) {
                    $profile_picture = 'uploads/profile_picture/' . $file_name;
                } else {
                    redirect()->to('/admin/user-management?status=error&message=' . urlencode('Failed to move uploaded file.'));
                }
            }

            $users->db->query('INSERT INTO users (emp_id, first_name, middle_name, last_name, gender, birthdate, age, position, contact, address, email, password, type_of_contract, date_of_joining, department_id, role_id, status, profile_picture) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [$emp_id, $first_name, $middle_name, $last_name, $gender, $birthdate, $age, $position, $contact, $address, $email, $password, $type_of_contract, $date_of_joining, $department_id, $role_id, $status, $profile_picture]);            
            return redirect()->to('/admin/user-management?status=success');
        }
        catch(Exception $e) {
            return redirect()->to('/admin/user-management?status=error&message=' . urlencode($e->getMessage()));
        }
    }

    ## View user
    public function view_user($user_id) {   
        $userId = $user_id ?? 0;
        $users = new users();
        $user = $users->db->query('SELECT users.id, emp_id, first_name, middle_name, last_name, gender, email, contact, position, type_of_contract, departments.name as department_name, roles.name as role_name, status, date_of_joining, birthdate, address, profile_picture
                                        FROM users 
                                        JOIN departments ON users.department_id = departments.id 
                                        JOIN roles ON users.role_id = roles.id
                                        WHERE users.id = ?', [$userId])->getRowArray();

        if(!$user) return "User not Found! <a href='". base_url('/admin/dashboard') . "'> Return to safety</a>";

        $data = [
            'title' => 'View User | Admin',
            'user' => $user
        ];
        return view('admin/pages/user_management/view_user', $data);
    }

    ## Edit user
    public function edit_user($user_id) {
        $userId = $user_id ?? 0;
        $users = new users();
        $department = new departments();
        $role = new roles();

        // if using post method when submitted
        if($this->request->getMethod() === "POST" && $user_id) {
            $emp_id = $this->request->getPost('emp_id'); 
            $first_name = $this->request->getPost('first_name'); 
            $middle_name = $this->request->getPost('middle_name'); 
            $last_name = $this->request->getPost('last_name'); 
            $gender = $this->request->getPost('gender'); 
            $birthdate = $this->request->getPost('birthdate'); 
            $position = $this->request->getPost('position'); 
            $contact = $this->request->getPost('contact'); 
            $address = $this->request->getPost('address'); 
            $email = $this->request->getPost('email'); 
            $type_of_contract = $this->request->getPost('type_of_contract'); 
            $date_of_joining = $this->request->getPost('date_of_joining'); 
            $department_id = $this->request->getPost('department_id'); 
            $role_id = $this->request->getPost('role_id'); 
            $status = $this->request->getPost('status'); 

            // Handle file upload
            $profile_picture = $this->request->getFile('profile_picture');
            if ($profile_picture && $profile_picture->isValid() && !$profile_picture->hasMoved()) {
                $target_dir = ROOTPATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'profile_picture';
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true); // Use 0755 for better security
                }
                $file_name = $profile_picture->getRandomName(); // Generates a unique name
                if ($profile_picture->move($target_dir, $file_name)) {
                    $profile_picture = 'uploads/profile_picture/' . $file_name;
                } else {
                    redirect()->to('/admin/user-management?status=error&message=' . urlencode('Failed to move uploaded file.'));
                }
            }

            $updatedUser = $users->db->query('UPDATE users SET emp_id = ?, first_name = ?, middle_name = ?, last_name = ?, gender = ?, birthdate = ?, position = ?, contact = ?, address = ?, email = ?, type_of_contract = ?, date_of_joining = ?, department_id = ?, role_id = ?, status = ?, profile_picture = ? WHERE id = ?',
                                            [$emp_id, $first_name, $middle_name, $last_name, $gender, $birthdate, $position, $contact, $address, $email, $type_of_contract, $date_of_joining, $department_id, $role_id, $status, $profile_picture, $user_id]);                

            
            if(!$updatedUser) return "Can't update, User not found! <br><a href='". base_url('/admin/user-management/edit') . "'> Return to safety</a>";
            return redirect()->back();
        }

        $user = $users->db->query('SELECT users.id, emp_id, first_name, middle_name, last_name, gender, email, contact, position, type_of_contract, users.department_id, users.role_id, status, date_of_joining, birthdate, address, profile_picture
                                        FROM users 
                                        WHERE users.id = ?', [$userId])->getRowArray();
        $departments = $department->db->query('SELECT id, name FROM departments')->getResultArray();
        $roles = $role->db->query('SELECT id, name FROM roles')->getResultArray();

        if(!$user) return "User not Found! <a href='". base_url('/admin/dashboard') . "'> Return to safety</a>";

        $data = [
            'title' => 'Edit User | Admin',
            'user' => $user,
            'departments' => $departments,
            'roles' => $roles,
        ];
        return view('admin/pages/user_management/edit_user', $data);
    }

    ## Archived user
    public function archived_user($user_id) {
        $userId = $user_id ?? 0;
        if($this->request->getMethod() == 'POST') 
            return redirect()->to('/admin/user-management?status=error&message=' . urlencode('Invalid request.'));

        try {
            $users = new users();
            $user = $users->db->query("SELECT * FROM users WHERE id = ?", [$userId])->getRowArray();
            if($user) {
                $users->db->query("UPDATE users SET user_archived = 1 WHERE id = ?", [$userId]);
                return redirect()->to('/admin/user-management?status=archived_successful&message=' . urlencode('User has been successfully archived.'));
            }
            else {
                return redirect()->to('/admin/user-management?status=archived_error&message=' . urlencode('User not found.'));
            }
        }
        catch(Exception $e) {
            return redirect()->to('/admin/user-management?status=archived_error&message=' . urlencode($e->getMessage()));
        }
    }

    ## Restore user
    public function restore_user($user_id) {
        $userId = $user_id ?? 0;
        if($userId == 0) return "Can't update, User not found! <br><a href='". base_url('/admin/user-management/edit') . "'> Return to safety</a>";

        try {
            $users = new users();
            $user = $users->db->query("SELECT * FROM users WHERE id = ?", [$userId])->getRowArray();

            if($user) {
                $users->db->query('UPDATE users SET user_archived = 0 WHERE id = ?', [$userId]);
                return redirect()->to('/admin/user-management?status=restore_successful&message=' . urlencode('User has been successfully archived.'));
            }
            else {
                return redirect()->to('/admin/user-management?status=restore_error&message=' . urlencode('User not found.'));
            }
        }
        catch(Exception $e) {
            return redirect()->to('/admin/user-management?status=restore_error&message=' . urlencode($e->getMessage()));
        }
    }

    ## Delete user
    public function delete_user($user_id) {
        $userId = $user_id ?? 0;
        if($userId == 0) return "Can't update, User not found! <br><a href='". base_url('/admin/user-management/edit') . "'> Return to safety</a>";

        try {
            $users = new users();
            $user = $users->db->query("SELECT * FROM users WHERE id = ?", [$userId])->getRowArray();

            if($user) {
                $users->db->query('UPDATE users SET user_delete = 1 WHERE id = ?', [$userId]);
                return redirect()->to('/admin/user-management?status=delete_successful&message=' . urlencode('User has been successfully archived.'));
            }
            else {
                return redirect()->to('/admin/user-management?status=delete_error&message=' . urlencode('User not found.'));
            }
        }
        catch(Exception $e) {
            return redirect()->to('/admin/user-management?status=delete_error&message=' . urlencode($e->getMessage()));
        }
    }
}
