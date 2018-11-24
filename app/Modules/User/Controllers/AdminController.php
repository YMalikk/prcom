<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Modules\User\Models\User;
class AdminController extends Controller
{

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $user->last_connected_time=Carbon::now();
        $user->save();
        if(!$this->isAdmin($user))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }


    //*********** Users Crud *****************//

    public function getUsers()
    {

        return response()->json(User::Where('role_id','!=',1)->with('images')->get());

    }

    public function getUserById($id)
    {
        $user=User::find($id);

        if($user)
        {
            return response()->json($user);

        }

            return response()->json([
                'message' => 'Not found'
            ], 401);

    }

    public function editUser(Request $request,$id)
    {
        $user=User::find($id);

        if($user)
        {
            $request->validate([
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'email' => 'required|string|email',
                'password' => 'string',
                'tel'=>'required|string',
                'address'=>'string',
                'sex'=>'required|string',
                'birth_date'=>'required|date|date_format:Y-m-d',
                'hired_date'=>'date|date_format:Y-m-d',
                'civil_situation'=>'string',
                'cin'=>'required|string',
                'passport'=>'required|string',
                'banned_time'=>'string',
                'nationality'=>'required|string'

            ]);

            $user->update($request->all());
            return response()->json($user);

        }

        return response()->json([
            'message' => 'Not found'
        ], 401);

    }

    public function deleteUser($id)
    {
        $user=User::find($id);
        if($user)
        {
            $user->status=-1;
            $user->save();
            return response()->json($user);
        }
        return response()->json([
            'message' => 'Not found'
        ]);
    }

    public function restoreUser($id)
    {
        $user=User::find($id);
        if($user)
        {
            $user->status=1;
            $user->save();
            return response()->json($user);
        }
        return response()->json([
            'message' => 'Not found'
        ]);
    }


}