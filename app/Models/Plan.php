<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plan extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_en',
        'name_ar',
        'name_en',
        'description_en',
        'description_ar',
        'description_fr',
        'price',
        'unit',
        'per',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
