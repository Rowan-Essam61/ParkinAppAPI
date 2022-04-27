<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\car;
use Illuminate\Support\Facades\DB as DB;

class CarController extends Controller
{
    public function getall()
    {
        $cars = car::all();
        $response["cars"] = $cars;
        $response["success"] = 1;
        return response()->json($response);
    }
    public function getbyid($id)
    {
        $cars = DB::table('cars')->where('id', $id)->get();

        return response()->json($cars);
    }
    public function insert(Request $request)
    {
        $car = new car();
        $car->id = $request->id;
        $car->category = $request->category;
        $car->type = $request->type;
        $car->color = $request->color;
        $car->user_id = $request->user_id;
        $car->save();
        return response()->json(['msg' => 'zftttttttttttt', 200]);
    }

    public function getbyuser($id)
    {
        $cars = DB::table('cars')->where('user_id', $id)->get();

        return response()->json($cars);
    }



    public function delete($id)
    {
        $car = car::find($id);
        $car->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {
        $car = new car();
        $car = car::find($id);

        $car->category = $request->category;
        $car->type = $request->type;
        $car->color = $request->color;
        $car->update();
        $response["cars"] = $car;
        $response['success'] = 1;
        return response()->json($response);
    }
}
