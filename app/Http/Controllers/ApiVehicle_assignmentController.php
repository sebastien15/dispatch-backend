<?php

namespace App\Http\Controllers;

use App\Vehicle_assignment;
use Illuminate\Http\Request;

class ApiVehicle_assignmentController extends Controller
{

    public function index()
    {
        $vehicle_assignments = Vehicle_assignment::all();
        return response()->json([
            "success" => true,
            "message" => "vehicle_assignments list",
            "data"    => $vehicle_assignments
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
            'color' => 'required',
            'vehicle_make' => 'required',
            'vehicle_no' => 'required',
            'vehicle_owner' => 'required',
            'vehicle_model' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $vehicle_assignment = Vehicle_assignment::create($input);
        return response()->json([
            "success" => true,
            "message" => "vehicle_assignment created successfully",
            "data"    => $vehicle_assignment
        ]);
    }

    public function show( $id)
    {
        $vehicle_assignment = Vehicle_assignment::find($id);
        
        if (is_null($vehicle_assignment)) {
        return $this->sendError('Vehicle_assignment not found.');
        };
        return response()->json([
            "success" => true,
            "message" => "Vehicle_assignment retrieved successfully.",
            "data" => $vehicle_assignment
        ]);
    }


    public function edit(Vehicle_assignment $vehicle_assignment)
    {
        //
    }

    public function update(Request $request, Vehicle_assignment $vehicle_assignment)
    {
        $input = $request->all();
        $vehicle_assignment = Vehicle_assignment::find($id);
        $validator = Validator::make($input, [
            'vehicle_type'  => 'required',
            'color'         => 'required',
            'vehicle_make'  => 'required',
            'vehicle_no'    => 'required',
            'vehicle_owner' => 'required',
            'vehicle_model' => 'required'
        ]);
        
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $vehicle_assignment->vehicle_type  = $input['vehicle_type'];
        $vehicle_assignment->color         = $input['color'];
        $vehicle_assignment->vehicle_make  = $input['vehicle_make'];
        $vehicle_assignment->vehicle_no    = $input['vehicle_no'];
        $vehicle_assignment->vehicle_owner = $input['vehicle_owner'];
        $vehicle_assignment->vehicle_model = $input['vehicle_model'];
        $vehicle_assignment->save();
        
        return response()->json([
            "success" => true,
            "message" => "Vehicle_assignment updated successfully.",
            "data" => $vehicle_assignment
        ]);
    }

    public function destroy(Vehicle_assignment $vehicle_assignment)
    {
        $vehicle_assignment = Vehicle_assignment::find($id); 
        $vehicle_assignment->delete();
        return response()->json([
            "success" => true,
            "message" => "Vehicle_assignment deleted successfully.",
            "data" => $vehicle_assignment
        ]);
    }
}
