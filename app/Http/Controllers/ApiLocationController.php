<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Validator;

class ApiLocationController extends Controller
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
        $locations = Location::all();
        return response()->json([
            "success" => true,
            "message" => "locations list",
            "data"    => $locations
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
            'loc_name' => 'required',
            'loc_type' => 'required',
            'zone_id' => 'required',
            'post_code' => 'required',
            'address' => 'required',
            'extra_charges' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError(201,'Saving location denied.', $validator->errors());
        }
        $location = Location::create($input);
        return response()->json([
            "success" => true,
            "message" => "location created successfully",
            "data"    => $location
        ]);
    }

    public function show( $id)
    {
        $location = Location::find($id);
        
        if (is_null($location)) {
        return $this->sendError('Location not found.');
        };
        return response()->json([
            "success" => true,
            "message" => "location retrieved successfully.",
            "data" => $location
        ]);
    }

    public function edit(Location $location)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $location = Location::find($id);
        $validator = Validator::make($input, [
            'loc_name' => 'required',
            'loc_type' => 'required',
            'zone_id' => 'required',
            'post_code' => 'required',
            'extra_charges' => 'required',
            'address'=>'required'
        ]);
        
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $location->loc_name = $input['loc_name'];
        $location->loc_type = $input['loc_type'];
        $location->zone_id = $input['zone_id'];
        $location->extra_charges = $input['extra_charges'];
        $location->save();
        
        return response()->json([
            "success" => true,
            "message" => "location updated successfully.",
            "data" => $location
        ]);
    }

    public function destroy( $id)
    {
        $location = Location::find($id); 
        $location->delete();
        return response()->json([
            "success" => true,
            "message" => "location deleted successfully.",
            "data" => $location
        ]);
    }
}
