<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $view = 'admin.service.';
    protected $redirect = 'super-admin/settings';
    public function index()
    {
        return view($this->view .'index');
    }

    public function create()
    {
        return view($this->view . 'create');
    }
}
