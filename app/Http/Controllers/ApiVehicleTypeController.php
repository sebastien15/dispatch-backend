<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_type;
use Validator;

class ApiVehicleTypeController extends Controller
{
    public function sendError($status,$message,$validationErrors)
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "validation errors" => $validationErrors
        ]);
    }

    public function index()
    {
        $vehicle_types = Vehicle_type::all();
        return response()->json([
            "status" => "200",
            "success" => true,
            "message" => "vehicle_types list",
            "data"    => $vehicle_types
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'vehicle_type' => 'required',
            'no_of_passenger' => 'required',
            'no_of_luggage' => 'required',
            'no_of_hand_luggage' => 'required',
            'photo' => 'required',
            'start_rate' => 'required',
            'no_of_miles_for_start_rate' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError(201,"saving vehicle_type denied", $validator->errors());
        }
        $vehicle_type = Vehicle_type::create($input);
        return response()->json([
            "success" => true,
            "message" => "vehicle_type created successfully",
            "data"    => $vehicle_type
        ]);
    }

    
    public function show($id)
    {
        $vehicle_type = Vehicle_type::find($id);
            
            if (is_null($vehicle_type)) {
            return $this->sendError(404,'Vehicle_type not found.');
            };

            return response()->json([
                "status"=> "201",
                "success" => true,
                "message" => "Vehicle_type retrieved successfully.",
                "data" => $vehicle_type
            ]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $vehicle_type = Vehicle_type::find($id);
        $validator = Validator::make($input, [
            'vehicle_type' => 'required',
            'no_of_passenger' => 'required',
            'no_of_luggage' => 'required',
            'no_of_hand_luggage' => 'required',
            'photo' => 'required',
            'start_rate' => 'required',
            'no_of_miles_for_start_rate' => 'required'
        ]);

        if (is_null($vehicle_type)) {
            return $this->sendError(404,'Vehicle_type not found.',"");
        };
        if($validator->fails()){
        return $this->sendError(201,"update vehicle_type denied", $validator->errors());       
        }
        
        $vehicle_type->vehicle_type = $input['vehicle_type'];
        $vehicle_type->no_of_passenger = $input['no_of_passenger'];
        $vehicle_type->no_of_luggage = $input['no_of_luggage'];
        $vehicle_type->no_of_hand_luggage = $input['no_of_hand_luggage'];
        $vehicle_type->photo = $input['photo'];
        $vehicle_type->start_rate = $input['start_rate'];
        $vehicle_type->background = $input['background'];
        $vehicle_type->text_color = $input['text_color'];
        $vehicle_type->save();
        
        return response()->json([
            "success" => true,
            "message" => "Vehicle_type updated successfully.",
            "data" => $vehicle_type
        ]);
    }

    
    public function destroy($id)
    {
        $vehicle_type = Vehicle_type::find($id); 
        $vehicle_type->delete();
        return response()->json([
            "success" => true,
            "message" => "Vehicle_type deleted successfully.",
            "data" => $vehicle_type
        ]);
    }
}
