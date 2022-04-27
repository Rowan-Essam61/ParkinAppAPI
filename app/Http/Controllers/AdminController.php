<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parkingsecurity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB as DB;

class AdminController extends Controller
{
    public function getdailystatistics($id)
    {
        $today = date("Y-m-d");
        $registrations = DB::table('registrations')->where('parking_id', $id)->where('date', $today)->get();
        $availableslots = DB::table('parkingslots')->where('parking_id', $id)->where('status', 'available')->get();
        $outslots = DB::table('parkingslots')->where('parking_id', $id)->where('status', 'out of order')->get();
        $response['registrations'] = $registrations;
        $response['available_slots'] = $availableslots;
        $response['out_slots'] = $outslots;
        return response()->json($response);
    }
    public function getweeklychart($id)
    {
        $startolddate = Carbon::now()->subWeek()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $endolddate = Carbon::now()->subWeek()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

        $startnewdate = Carbon::now()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $endnewdate = Carbon::now()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

        $oldperiod = CarbonPeriod::create($startolddate, $endolddate);
        $olddates = $oldperiod->toArray();
        $newperiod = CarbonPeriod::create($startnewdate, $endnewdate);
        $newdates = $newperiod->toArray();

        $lastweek = array();
        $thisweek = array();

        for ($i = 0; $i < count($olddates); $i++) {
            $oldvalues = DB::table('registrations')->where('parking_id', $id)->where('date', $olddates[$i])->count();
            array_push($lastweek, $oldvalues);
        }
        for ($i = 0; $i < count($newdates); $i++) {
            $oldvalues = DB::table('registrations')->where('parking_id', $id)->where('date', $newdates[$i])->count();
            array_push($thisweek, $oldvalues);
        }
        $response['old_values'] = $lastweek;
        $response['new_values'] = $thisweek;
        return response()->json($response);
    }
    public function getparkingid($id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        $parking = DB::table('parkingspaces')->where('admin_id', $id)->get();
        $response['user'] = $user;
        $response['parking'] = $parking;
        return response()->json($response);
    }
    public function getid($id)
    {
        $admin_id = DB::table('parkingspaces')->where('id', $id)->pluck('admin_id');
        $user = DB::table('users')->where('id', $admin_id)->get();
        $response['user'] = $user;
        return response()->json($response);
    }
    public function getbyemail($id)
    {
        $user = DB::table('users')->where('email', $id)->get();
        $response['user'] = $user;
        return response()->json($response);
    }
    public function getallsecurity($id)
    {
        $security = DB::table('parkingsecurities')->where('parking_id', $id)->get();
        $response['security'] = $security;
        return response()->json($response);
    }
    public function changestatus(Request $request, $id)
    {
        $security = new parkingsecurity();
        $security = parkingsecurity::find($id);
        $security->status = $request->status;
        $security->update();
        $response["security"] = $security;
        return response()->json($response);
    }
    public function insert(Request $request, $id)
    {
        $security = new parkingsecurity();
        $security->parking_id = $id;
        $security->security_id = $request->security_id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->gender = $request->gender;
        $security->address = $request->address;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->phone = $request->phone;
        $security->status = $request->status;
        $security->save();
        $response["security"] = $security;
        return response()->json($response);
    }
    public function delete($id)
    {
        $security = parkingsecurity::find($id);
        $security->delete();
        $response["security"] = $security;
        return response()->json($response);
    }
    public function update(Request $request, $id)
    {
        $security = new parkingsecurity();
        $security = parkingsecurity::find($id);
        $security->security_id = $request->security_id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->gender = $request->gender;
        $security->address = $request->address;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->phone = $request->phone;
        // $security->status = $request->status;
        // $security->created_at = $request->created_at;
        $security->update();
        $response["security"] = $security;
        return response()->json($response);
    }
}
