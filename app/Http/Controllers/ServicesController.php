<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    protected $view = 'homepage.service.';
    public function daily_living_support()
    {
        $services = Service::all();
        $service_image = $services->where('slug', 'daily-living-support')->first();
        $service_image_description = $services->where('slug', 'daily-living-support')->first();
        return view($this->view .'daily-living-support', compact('service_image','service_image_description'));
    }

    public function support_coordination()
    {
        $services = Service::all();
        $support_coordinations = $services->where('slug', 'support-coordination')->first();
        return view($this->view .'support_coordination',compact('support_coordinations'));
    }

    public function community_participation()
    {
        $services = Service::all();
        $support_communities = $services->where('slug', 'community-participation')->first();
        return view($this->view .'community_participation',compact('support_communities'));
    }

    public function plan_management()
    {
        $services = Service::all();
        $plan_management = $services->where('slug', 'plan-management')->first();
        return view($this->view .'plan_management',compact('plan_management'));
    }

    public function household_task_support()
    {
        $services = Service::all();
        $household_tasks = $services->where('slug', 'household-tasks')->first();
        return view($this->view .'household_task_support',compact('household_tasks'));
    }

    public function respite_care()
    {
        $services = Service::all();
        $respite_cares = $services->where('slug', 'respite-care')->first();
        return view($this->view .'respite_care',compact('respite_cares'));
    }
}
