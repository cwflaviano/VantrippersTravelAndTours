<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VantripperInvoice\InvoicePackageModel;

class PackagesController extends BaseController
{
    ## return view
    public function packages() {;
        return view('admin/pages/crm/sales/packages/packages', ['title' => 'Packages Management | Admin']);
    }

    ## return json response / AJAX datatables response
    public function fetch_data() {
        $invoicePackageModel = new InvoicePackageModel();
        $request = $this->request->getGet();
        $draw = isset($request['draw']) ? (int)$request['draw'] : 0;
        $start = isset($request['start']) ? (int)$request['start'] : 0;
        $length = isset($request['length']) ? (int)$request['length'] : 10;

        $searchValue = isset($request['search']['value']) ? $request['search']['value'] : '';

        $orderColumnIndex = isset($request['order'][0]['column']) ? (int)$request['order'][0]['column'] : 0;
        $orderDir = isset($request['order'][0]['dir']) && $request['order'][0]['dir'] === 'desc' ? 'DESC' : 'ASC';

        // Define columns for ordering
        $columns = ['id', 'sku', 'quantity', 'category', 'items', 'item_full_details', 'price'];
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';

        // Get data
        $recordsTotal = $invoicePackageModel->getTotalRecords();
        $recordsFiltered = $invoicePackageModel->getFilteredRecords($searchValue);
        $data = $invoicePackageModel->getData($start, $length, $searchValue, $orderColumn, $orderDir);

        // Prepare response
        $output = [
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ];

        return $this->response->setJSON($output);
    }


    // Handle Create
    public function create_package() {
        $invoicePackageModel = new InvoicePackageModel();

        if ($this->request->getMethod() === 'POST') {
            $data = [
                'sku' => trim($this->request->getPost('sku')),
                'quantity' => (int)$this->request->getPost('quantity'),
                'category' => trim($this->request->getPost('category')),
                'items' => trim($this->request->getPost('items')),
                'item_full_details' => trim($this->request->getPost('item_full_details')),
                'price' => (float)$this->request->getPost('price')
            ];

            if ($data['sku'] && $data['items'] && $data['price'] > 0) {
                $invoicePackageModel->insert($data);
                session()->setFlashdata('success', 'New package created successfully!');
                return redirect()->to('/admin/crm/sales/packages');
            } else {
                session()->setFlashdata('error', 'Please fill in all required fields correctly.');
                return redirect()->back();
            }
        }
    }

    ## edit pacakge
    public function edit_package($id) {

        if(!$id) return redirect()->back();

        $invoicePackageModel = new InvoicePackageModel();
        if($id && $this->request->getPost('action') && $this->request->getMethod() === 'POST') {
            $sku      = trim($this->request->getPost('sku'));
            $category = trim($this->request->getPost('category'));
            $items    = trim($this->request->getPost('items'));
            $details  = trim($this->request->getPost('item_full_details'));
            $price    = intval($this->request->getPost('price'));
            $quantity = intval($this->request->getPost('quantity'));

            if($sku && $category && $items && $price > 0) {
                $invoicePackageModel->db->query("UPDATE invoice_package SET sku = ?, quantity = ?,category = ?, items = ?, item_full_details = ?, price = ? WHERE id = ?", 
                                                 [$sku, $quantity ,$category, $items, $details, $price, $id]);
                return redirect()->back()->with('success', 'updated successfully.');
            }
            else {
                return redirect()->back()->with('error', 'Please fill in all required fields correctly.');
            }
        }

        $package = $invoicePackageModel->db->query("SELECT * FROM invoice_package WHERE id = ?", [$id])->getRowArray();
        $data = [
            'title' => 'Edit Pacakge Invoice | Admin',
            'id' => $id,
            'package' => $package
        ];
        return view('admin/pages/crm/sales/packages/edit_invoice_package', $data);
    }

    // Handle Delete
    public function delete_package($id) {
        $id = (int)$id;
        $invoicePackageModel = new InvoicePackageModel();

        if ($id > 0) {
            $invoicePackageModel->delete($id);
            session()->setFlashdata('success', 'Record successfully deleted!');
        }
        return redirect()->back();
    }
}
