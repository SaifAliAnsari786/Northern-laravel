<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDescription extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'image_alt',
        'title',
        'description',
        'slug',
        'order_by',

    ];


}
