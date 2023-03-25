<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProfileLang extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'profile_id',
        'language_id',
        'address',
        'last_name',
        'first_name',

    ];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
