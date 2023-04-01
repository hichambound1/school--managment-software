<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Option extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_en',
        'name_ar',
        'name_fr',
        'description_en',
        'description_ar',
        'description_fr',
        'key',
        'value',
        'plan_id',

    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
