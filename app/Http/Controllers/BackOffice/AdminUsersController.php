<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function getUsers()
    {
        $this->authorize('can_view_user');
        $adminsAndSuperAdminsUsers= User::where('is_admin',1)->paginate();
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
}
