<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{

    protected $view = 'homepage.service.';
    public function daily_living_support()
    {
        return view($this->view .'daily-living-support');
    }

    public function support_coordination()
    {
        return view($this->view .'supdiport_coornation');
    }

    public function community_participation()
    {
        return view($this->view .'community_participation');
    }

    public function plan_management()
    {
        return view($this->view .'plan_management');
    }

    public function respite_care()
    {
        return view($this->view .'respite_care');
    }
}
