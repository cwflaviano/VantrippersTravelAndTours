<?php

namespace App\Controllers\AdminControllers;
use App\Controllers\BaseController;
use App\Models\VantripperDB\Users_Model as users;
use App\Models\VantripperDB\Roles_Model as roles;
use App\Models\VantripperDB\Departments_Model as departments;
use Exception;

class UsersController extends BaseController {

    ## Redirect or Post in users management
    public function usersManagement() {
        $filter = $this->request->getGet("filter") ?? 'active';
        $statusFilter = $this->request->getGet('status') ?? null;

        $archivedCondition = ($filter === 'archived') ? "u.user_archived = 1" : "u.user_archived = 0";
        $statusCondition = is_numeric($statusFilter) ? " AND u.status = {$statusFilter}" : "";
        
        $users = new users();
        $roles = new roles();
        $departments = new departments();

        $data = [
            'statusFilter' => $statusFilter,
            'filter' => $filter,
            'users' => $users->GetAllUsersByFIlters($archivedCondition, $statusCondition),
            'roles' => $roles->GetRoles(),
            'departments' => $departments->GetDepartments() 
        ];

        return view("Adminpage/Pages/UserManagement/users", $data);
    }

    ## Redirect to View user page
    public function viewUser($user_id) {
        $user = new users();
        $user = $user->GetUserByiD($user_id);
        if(!$user)   
            return redirect()->to('/admin/message_page');

        return view('Adminpage/Pages/UserManagement/view_user', ['user' => $user]);
    }

    ## Redirect to Message page
    public function messagePage() {
        return view('Adminpage/Pages/UserManagement/message_page');
    }

    ## Create new admin user 
    public function createNewUser() {
        // NOT YET MIGRATED
    }

    ## Delete user
    public function deleteUser($user_id) {
        // NOT YET MIGRATED
    }

    ## Restore User 
    public function restoreUser($user_id) {
        // NOT YET MIGRATED
    }

    ## Archived user
    public function archivedUser($user_id) {
        // NOT YET MIGRATED
    }
}







