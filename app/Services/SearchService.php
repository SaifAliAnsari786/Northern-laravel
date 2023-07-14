<?php

namespace App\Services;

use App\Models\DisplayHome;
use App\Models\HomeDesign;

class SearchService
{
    public static function homeDesignSearch()
    {
        $query = HomeDesign::query();
        if (request('name')) {
            $key = request('name');
            $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('home_design_name')) {
            $key = request('home_design_name');
            $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('storey_design')) {
            $key = request('storey_design');
            $query->where('design_type', $key);
        }
        if (request('bed')) {
            $key = request('bed');
            $query->where('bed', $key);
        }
        if (request('design_bed')) {
            $key = request('design_bed');
            $query->where('bed', $key);
        }
        if (request('bath')) {
            $key = request('bath');
            $query->where('bath', $key);
        }
        if (request('design_bath')) {
            $key = request('design_bath');
            $query->where('bath', $key);
        }
        if (request('garage')) {
            $key = request('garage');
            $query->where('garage', $key);
        }
        if (request('design_garage')) {
            $key = request('design_garage');
            $query->where('garage', $key);
        }
        return $query->where('status', 1)->paginate(config('custom.per_page'));
    }

    public static function displayHomeSearch()
    {
        $query = DisplayHome::query();
        if (request('name')) {
            $key = request('name');
            $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('display_location')) {
            $key = request('display_location');
            $query->where('location', 'like', '%' . $key . '%');
        }
        if (request('display_home_name')) {
            $key = request('display_home_name');
            $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('storey_design')) {
            $key = request('storey_design');
            $query->where('design_type', $key);
        }
        if (request('storey_display')) {
            $key = request('storey_display');
            $query->where('design_type', $key);
        }
        if (request('bed')) {
            $key = request('bed');
            $query->where('bed', $key);
        }
        if (request('display_bed')) {
            $key = request('display_bed');
            $query->where('bed', $key);
        }
        if (request('bath')) {
            $key = request('bath');
            $query->where('bath', $key);
        }
        if (request('display_bath')) {
            $key = request('display_bath');
            $query->where('bath', $key);
        }
        if (request('garage')) {
            $key = request('garage');
            $query->where('garage', $key);
        }
        if (request('display_garage')) {
            $key = request('display_garage');
            $query->where('garage', $key);
        }
        return $query->where('status', 1)->paginate(config('custom.per_page'));
    }

}
