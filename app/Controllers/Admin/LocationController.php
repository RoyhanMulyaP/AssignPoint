<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LocationModel;

class LocationController extends BaseController
{
    protected $locationModel;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
    }

    public function index()
    {
        $data = [
            'locations' => $this->locationModel->findAll(),
            'title' => 'Locations'
        ];
        return view('admin/locations/index', $data);
    }

    public function save()
    {
        $this->locationModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->back()->with('success', 'Location added.');
    }

    public function delete($id)
    {
        $this->locationModel->delete($id);
        return redirect()->back()->with('success', 'Location deleted.');
    }
}
