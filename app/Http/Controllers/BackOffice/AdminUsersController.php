<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\AdminUsers\UpdateAdminUserRequest;
use App\Http\Requests\BackOffice\Auth\RegisterRequest;
use App\Models\Language;
use App\Models\Profile;
use App\Models\ProfileLang;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function getUsers()
    {
        $this->authorize('can_view_user');
        $adminsAndSuperAdminsUsers= User::where('is_admin',1)->get();
        return response($adminsAndSuperAdminsUsers,200);
    }
    public function DeactivateUser($id)
    {
        $this->authorize('can_edit_user');
        $user= User::whereId($id)->first();
        if(isset($user)){
            $user->update(['is_active'=>false]);
            return response("user deactivated succefully",200);
        }else{
            return response("user not found",404);
        }
    }
    public function ActivateUser($id)
    {
        $this->authorize('can_edit_user');
        $user= User::whereId($id)->first();
        if(isset($user)){
            $user->update(['is_active'=>true]);
            return response("user deactivated succefully",200);
        }else{
            return response("user not found",404);
        }
    }
    public function storeAdmin(RegisterRequest $request)
    {

        $this->authorize('can_add_user');
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
        return response("admin added succefully",200);
    }
    public function update(UpdateAdminUserRequest $request)
    {
        $this->authorize('can_edit_user');
        $user= User::where('is_admin',1)->whereId($request->id)->first();
        if(!isset($user)){
            return response("admin nor found",404);
        }
        $user->update([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $profile=Profile::where('user_id',$user->id)->updateOrCreate([
            'cin'=>$request->cin,
            'birthday'=>$request->birthday,
        ]);
        $updated_profile=Profile::where('user_id',$user->id)->first();

        $languages= Language::all();
        foreach ($languages as $language) {
            $profileLanguage= ProfileLang::where('profile_id',$updated_profile->id)->where('language_id',$language->id)->updateOrCreate([
                    'language_id'=>$language->id,
                    'profile_id'=>$updated_profile->id,
                    'address'=>$request->{'address_'.Str::lower($language->symbole)},
                    'last_name'=>$request->{'last_name_'.Str::lower($language->symbole)},
                    'first_name'=>$request->{'first_name_'.Str::lower($language->symbole)},
            ]);
        }

        return response("record updated succefully",200);

    }
    public function deleteAdmin($id)
    {
        $user= User::whereId($id)->first();
        if(isset($user)){
            $user->delete();
            return response("user deleted succefully ",200);
        }else{
            return response("user not found ",404);
        }
    }
}
