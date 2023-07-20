<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=[
        'logo',
        'background_image_description',
        'title',
        'description',
        'description_image_position',
        'form',
        'seo_title',
        'seo_description',
        'meta_keyword',
        'meta_keyword_description',
        'order_by',
        'service_description_title',
      
    ];
}
