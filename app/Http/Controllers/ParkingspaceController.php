<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parkingspace;
use Illuminate\Support\Facades\DB as DB;

class ParkingspaceController extends Controller
{
    public function getall()
    {
        $parkingspace = parkingspace::all();
        $response["parkingspace"] = $parkingspace;
        $response["success"] = 1;
        return response()->json($response);
    }

    // public function getparkingsecurity($id){
    //     $securityman = DB::table('parkingsecuritys')->where('parking_id',$id)->get();
    //     $response["securityman"] = $securityman;
    //     return response()->json($response);
    //     }
    public function getbyid($id)
    {
        $parkingspace = DB::table('parkingspaces')->where('id', $id)->get();
        return response()->json($parkingspace);
    }

    public function getbycategory($id)
    {
        $parkingspace = DB::table('parkingspaces')->where('category', $id)->get();
        return response()->json($parkingspace);
    }
    // public function insertsecurityman(Request $request){

    //    return response()->json($parkingspace);
    //    }



    public function insert(Request $request)
    {
        $parkingspace = new parkingspace();
        $parkingspace->location = $request->location;
        $parkingspace->description = $request->description;
        $parkingspace->capacity = $request->capacity;
        $parkingspace->name = $request->name;
        $parkingspace->admin_id = $request->admin_id;
        $parkingspace->fees = $request->fees;
        $parkingspace->category = $request->category;
        $parkingspace->levels = $request->levels;
        // $parkingspace->img = $request->img;
        $parkingspace->save();
        $response['parkingspace'] = $parkingspace;
        return response()->json($response);
    }

    public function delete($id)
    {
        $parkingspace = parkingspace::find($id);
        $parkingspace->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {

        $parkingspace = new parkingspace();
        $parkingspace = parkingspace::find($id);
        $parkingspace->location = $request->location;
        $parkingspace->description = $request->description;
        $parkingspace->capacity = $request->capacity;
        $parkingspace->name = $request->name;
        $parkingspace->admin_id = $request->admin_id;
        $parkingspace->fees = $request->fees;
        $parkingspace->category = $request->category;
        $parkingspace->levels = $request->levels;
        $parkingspace->img = $request->img;
        $parkingspace->update();
        $response["parkingspace"] = $parkingspace;
        $response['success'] = 1;
        return response()->json($response);
    }
}
