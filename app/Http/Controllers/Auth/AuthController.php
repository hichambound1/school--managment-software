<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\Auth\LoginRequest;
use App\Http\Requests\BackOffice\Auth\RegisterRequest;
use App\Models\Language;
use App\Models\Profile;
use App\Models\ProfileLang;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        // Check email
        $user = User::where('email', $request['email'])->first();
        // Check password
        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'email or password invalide'
            ], 401);
        }
        $token = $user->createToken($user->email)->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function registerAdmin(RegisterRequest $request) {
        $user= User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'is_active'=>true,
            'is_admin'=>true
        ]);
        $user->assignRole('admin');
        $profile=Profile::create([
            'cin'=>$request->cin,
            'birthday'=>$request->birthday,
            'user_id'=>$user->id,
        ]);
        $languages= Language::all();
        $carbon_now=Carbon::now();
        $profileLanguage= ProfileLang::insert([
            [
                'profile_id'=>$profile->id,
                'language_id'=>$languages->where('name','arabic')->first()->id,
                'address'=>$request->address_ar,
                'last_name'=>$request->last_name_ar,
                'first_name'=>$request->first_name_ar,
                'created_at'=>$carbon_now,
                'updated_at'=>$carbon_now,
            ],
            [
                'profile_id'=>$profile->id,
                'language_id'=>$languages->where('name','frensh')->first()->id,
                'address'=>$request->address_fr,
                'last_name'=>$request->last_name_fr,
                'first_name'=>$request->first_name_fr,
                'created_at'=>$carbon_now,
                'updated_at'=>$carbon_now,

            ],
            [
                'profile_id'=>$profile->id,
                'language_id'=>$languages->where('name','english')->first()->id,
                'address'=>$request->address_en,
                'last_name'=>$request->last_name_en,
                'first_name'=>$request->first_name_en,
                'created_at'=>$carbon_now,
                'updated_at'=>$carbon_now,

            ],
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function logout(Request $request) {

        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
