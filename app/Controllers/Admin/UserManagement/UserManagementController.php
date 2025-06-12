<?php

namespace App\Controllers\Admin\UserManagement;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\VantripperDb\UsersModel as users;
use App\Models\VantripperDb\DepartmentsModel as departmets;
use App\Models\VantripperDb\RolesModel as roles;

class UserManagementController extends BaseController
{
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
        $deparment = new departmets();
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
}
