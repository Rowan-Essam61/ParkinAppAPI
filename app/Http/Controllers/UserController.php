<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\car;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\DB as DB;

class UserController extends Controller
{
    public function getall()
    {
        $users = user::all();
        $response["users"] = $users;
        $response["success"] = 1;
        return response()->json($response);
    }
    public function getusercar($id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        $car = DB::table('cars')->where('user_id', $id)->get();
        $response["user"] = $user;
        $response["car"] = $car;
        return response()->json($response);
    }

    public function getusername($id)
    {
        $user = DB::table('users')->where('email', $id)->get();
        $response["user"] = $user;
        return response()->json($response);
    }

    public function getbyid($id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        return response()->json($user);
    }

    public function insert(Request $request)
    {
        $user = new user();
        $user->id = $request->id;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->dob = $request->dob;
        $user->password = $request->password;
        $user->save();
        return response()->json(['msg' => 'success', 200]);
    }

    public function delete($id)
    {
        $user = user::find($id);
        $user->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {
        $user = new user();
        $user = user::find($id);
        $user->id = $request->id;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->dob = $request->dob;
        // $user->password =$request->password;
        $user->update();
        $response["users"] = $user;
        $response['success'] = 200;
        return response()->json($response);
    }
    public function updatepass(Request $request, $id)
    {
        $user = new user();
        $user = user::find($id);
        $user->password = $request->password;
        $user->update();
        $response["users"] = $user;
        $response['success'] = 1;
        return response()->json($response);
    }
}
