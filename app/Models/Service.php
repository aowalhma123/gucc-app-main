<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'service_informations';

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
