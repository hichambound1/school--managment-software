<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Profile;
use App\Models\ProfileLang;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::create([
            'email'=>'h.boundouq@gmail.com',
            'password'=>Hash::make(12345678),
            'is_active'=>true,
            'is_admin'=>true
        ]);
        $user->assignRole('super admin');
        $profile=Profile::create([
            'cin'=>'HHHHHHH',
            'birthday'=>'1999-01-01',
            'user_id'=>$user->id,
        ]);
        $languages= Language::all();
        $carbon_now=Carbon::now();
        $profileLanguage= ProfileLang::insert([
            [
                'profile_id'=>$profile->id,
                'language_id'=>$languages->where('name','arabic')->first()->id,
                'address'=>'آسفي المغرب',
                'last_name'=>'بوندوق',
                'first_name'=>'هشام',
                'created_at'=>$carbon_now,
                'updated_at'=>$carbon_now,
            ],
            [
                'profile_id'=>$profile->id,
                'language_id'=>$languages->where('name','frensh')->first()->id,
                'address'=>'safi,Morocco',
                'last_name'=>'boundouq',
                'first_name'=>'hicham',
                'created_at'=>$carbon_now,
                'updated_at'=>$carbon_now,

            ],
            [
                'profile_id'=>$profile->id,
                'language_id'=>$languages->where('name','english')->first()->id,
                'address'=>'safi,Morocco',
                'last_name'=>'boundouq',
                'first_name'=>'hicham',
                'created_at'=>$carbon_now,
                'updated_at'=>$carbon_now,

            ],
        ]);
    }
}
