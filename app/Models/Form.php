<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable=[
        'participant_fund',
        'enquirer_name',
        'phone_no',
        'email',
        'participant_name',
        'participant_age',
        'participant_gender',
        'participant_disability_type',
        'participant_suburb',
        'postcode',
        'state',
        'heard',
        'core_support',
        'capacity_building_supports',
        'coordination',
        'plan_management',
        'message',
        'image',

    ];
}
