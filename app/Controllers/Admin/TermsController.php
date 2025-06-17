<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VantripperInvoice\TermsModel as terms;

class TermsController extends BaseController
{
    // add or update terms if its http request is post
    public function terms_page(){
        $term = new terms();

        if($this->request->getMethod() === 'POST' && $this->request->getPost('action')) {
            $action = $this->request->getPost('action');
            $category = trim($this->request->getPost('category')) ?? '';
            $details = trim($this->request->getPost('details')) ?? '';

            if($action == 'create') 
                $term->db->query("INSERT INTO terms (category, details) VALUES (?, ?)", [$category, $details]);
            else if($action == 'update' && !empty($this->request->getPost('id'))) 
                $term->db->query("UPDATE terms SET category = ?, details = ? WHERE id = ?", [$category, $details, $this->request->getPost('id')]);
        }

        // get all terms to display
        $terms = $term->orderBy('id', 'DESC')->findAll();

        $data = [
            'title' => 'Terms Management | Admin',
            'terms' => $terms
        ];
        return view('admin/pages/crm/sales/terms/terms', $data);
    }

    ## delete a term by id
    public function delete_terms($term_id) {
        $term = new terms();
        
        if($this->request->getMethod() === 'GET' && !empty($term_id)) 
            $term->db->query('DELETE FROM terms WHERE id = ?', [$term_id]);
        return redirect()->back();
    }
}
