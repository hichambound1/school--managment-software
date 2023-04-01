<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'cin',
        'birthday',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileLanguage()
    {
        return $this->hasMany(ProfileLang::class);
    }
}
