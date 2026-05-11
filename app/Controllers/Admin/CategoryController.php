<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'categories' => $this->categoryModel->findAll(),
            'title' => 'Categories'
        ];
        return view('admin/categories/index', $data);
    }

    public function save()
    {
        $this->categoryModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->back()->with('success', 'Category added.');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->back()->with('success', 'Category deleted.');
    }
}
