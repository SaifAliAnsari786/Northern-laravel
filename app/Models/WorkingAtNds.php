<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingAtNds extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'phone_no',
        'email',
        'check',
        'message',
        'image',
    ];
}
