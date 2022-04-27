<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parkingslot;
use Illuminate\Support\Facades\DB as DB;

class ParkingslotController extends Controller
{
    public function getall()
    {
        $parkingslot = parkingslot::all();
        $response["parkingslot"] = $parkingslot;
        $response["success"] = 1;
        return response()->json($response);
    }


    public function getbyid($id)
    {
        $parkingslot = DB::table('parkingslots')->where('name', $id)->get();
        return response()->json($parkingslot);
    }

    public function getbyparkingid($id)
    {
        $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
        return response()->json($parkingslot);
    }

    public function insert(Request $request)
    {
        $parkingslot = new parkingslot();
        $parkingslot->name = $request->name;
        $parkingslot->level = $request->level;
        $parkingslot->parking_id = $request->parking_id;
        $parkingslot->status = $request->status;
        $parkingslot->save();
        $response['parkingslot'] = $parkingslot;
        return response()->json($response);
    }

    public function delete($id)
    {
        DB::delete('delete from parkingslots where name = ?', [$id]);
    }
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $level = $request->level;
        $parking_id = $request->parking_id;
        $status = $request->status;
        DB::update('update parkingslots set level = ?, status = ? where name = ? AND parking_id = ?', [$level, $status, $name, $parking_id]);
    }
    public function updatestatus(Request $request, $name)
    {

        $parking_id = $request->parking_id;
        $status = $request->status;
        DB::update('update parkingslots set status = ? where name = ? AND parking_id = ?', [$status, $name, $parking_id]);
    }
}
