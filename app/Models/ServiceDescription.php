<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDescription extends Model
{
    use HasFactory;
    protected $fillable=[
        'service_id',
        'image',
        'title',
        'description',
        'order_by',
      
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }

}
