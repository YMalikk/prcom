<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function isAdmin($user)
    {
        return $user->role_id==1;
    }

    function isPilot($user)
    {
        return $user->role_id==3;
    }

    function isSteward($user)
    {
        return $user->role_id==2;
    }

    function checkUserExist($id)
    {
        $user=User::find($id);

        if($user)
        {
            return response()->json($user);

        }
        else
        {
            return null;
        }
    }
}
