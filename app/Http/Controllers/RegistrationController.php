<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as DB;

class RegistrationController extends Controller
{
    public function getall()
    {
        $registration = registration::all();
        $response["registration"] = $registration;
        $response["success"] = 1;
        return response()->json($response);
    }

    public function getbyid($id)
    {
        $registration = DB::table('registrations')->where('id', $id)->get();
        return response()->json($registration);
    }

    public function getbyparkingid($id)
    {
        $today = date("Y-m-d");
        $registration = DB::table('registrations')->where('parking_id', $id)->where('date', $today)->get();
        $response["registration"] = $registration;

        return response()->json($response);
    }
    public function getbyuserid($id)
    {
        $registration = DB::table('registrations')->where('user_id', $id)->get();
        $response["registration"] = $registration;

        return response()->json($response);
    }
    public function insert(Request $request)
    {
        $registration = new registration();
        $registration->user_id = $request->user_id;
        $registration->car_id = $request->car_id;
        $registration->date = $request->date;
        $registration->status = $request->status;
        $registration->slot_name = $request->slot_name;
        $registration->leave_time = $request->leave_time;
        $registration->checkin_time = $request->checkin_time;
        $registration->parking_id = $request->parking_id;
        $registration->day = $request->day;
        $registration->save();
        $response["registration"] = $registration;

        return response()->json($response);
    }

    public function delete($id)
    {
        $registration = registration::find($id);
        $registration->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {

        $registration = new registration();
        $registration = registration::find($id);
        $registration->user_id = $request->user_id;
        $registration->car_id = $request->car_id;
        $registration->date = $request->date;
        $registration->status = $request->status;
        $registration->slot_name = $request->slot_name;
        $registration->leave_time = $request->leave_time;
        $registration->checkin_time = $request->checkin_time;
        $registration->parking_id = $request->parking_id;
        $registration->day = $request->day;
        $registration->update();
        $response["registration"] = $registration;
        $response['success'] = 1;
        return response()->json($response);
    }

    public function updatestatus(Request $request, $name)
    {
        $status = $request->status;
        DB::update('update registrations set status = ? where id = ?', [$status, $name]);
    }
}
