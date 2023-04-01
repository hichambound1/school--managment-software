<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function getUsers()
    {
        $adminsAndSuperAdminsUsers= User::where('is_admin',1)->paginate();
        return response($adminsAndSuperAdminsUsers,200);
    }
    public function DeactivateUser($id)
    {
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
        $user= User::whereId($id)->first();
        if(isset($user)){
            $user->update(['is_active'=>true]);
            return response("user deactivated succefully",200);
        }else{
            return response("user not found",404);
        }
    }
}
