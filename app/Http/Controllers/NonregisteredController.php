<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nonregistered;
use Illuminate\Support\Facades\DB as DB;

class NonregisteredController extends Controller
{
    public function getall()
    {
        $nonregistered = nonregistered::all();
        $response["nonregistered"] = $nonregistered;
        $response["success"] = 1;
        return response()->json($response);
    }
    // public function getnonregistered($id){
    //     $user = DB::table('nonregistereds')->where('id',$id)->get();
    //     $car = DB::table('cars')->where('user_id',$id)->get();
    //     $response["user"] = $user;
    //     $response["car"] = $car;
    //     return response()->json($response);
    //     }

    public function getbyid($id)
    {
        $nonregistered = DB::table('nonregistereds')->where('id', $id)->get();
        return response()->json($nonregistered);
    }
    public function getbysecurityman($id)
    {
        $nonregistered = DB::table('nonregistereds')->where('security_id', $id)->get();
        return response()->json($nonregistered);
    }
    public function insert(Request $request)
    {
        $nonregistered = new nonregistered();
        $nonregistered->username = $request->username;
        $nonregistered->date = $request->date;
        $nonregistered->security_id = $request->security_id;
        $nonregistered->slot_id = $request->slot_id;
        $nonregistered->leave_time = $request->leave_time;
        $nonregistered->id = $request->id;
        $nonregistered->carnumber = $request->carnumber;
        $nonregistered->nid = $request->nid;
        $nonregistered->save();
        return response()->json(['msg' => 'zftttttttttttt', 200]);
    }

    public function delete($id)
    {
        $nonregistered = nonregistered::find($id);
        $nonregistered->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {
        $nonregistered = new nonregistered();
        $nonregistered = nonregistered::find($id);
        $nonregistered->username = $request->username;
        $nonregistered->date = $request->date;
        $nonregistered->security_id = $request->security_id;
        $nonregistered->slot_id = $request->slot_id;
        $nonregistered->leave_time = $request->leave_time;
        $nonregistered->id = $request->id;
        $nonregistered->carnumber = $request->carnumber;
        $nonregistered->nid = $request->nid;
        $nonregistered->update();
        $response["nonregistered"] = $nonregistered;
        $response['success'] = 1;
        return response()->json($response);
    }
}
