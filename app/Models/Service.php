<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=[
        'logo',
        'logo_image_alt',
        'background_title',
        'background_image',
        'background_image_description',
        'background_image_alt',
        'title',
        'description',
        'service_image',
        'service_image_description',
        'service_image_alt',
        'description_image_position',
        'form',
        'seo_title',
        'seo_description',
        'meta_keyword',
        'meta_keyword_description',
        'slug',
        'status',

    ];

    public function serviceDescriptions()
    {
        return $this->hasMany(ServiceDescription::class);
    }
}
