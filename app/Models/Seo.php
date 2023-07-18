<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $fillable = ['seo_type', 'seo_title', 'seo_description', 'seo_keyword', 'seo_meta_keyword',
    'image', 'image_alt'];
}
