<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;
use Validator;

class ApiZoneController extends Controller
{

    public function index()
    {
        $zones = Zone::all();
        return response()->json([
            "success" => true,
            "message" => "zones list",
            "data"    => $zones
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
            'zone_name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $zone = Zone::create($input);
        return response()->json([
            "success" => true,
            "message" => "zone created successfully",
            "data"    => $zone
        ]);
    }

    public function show($id)
    {
        $zone = Zone::find($id);
        
        if (is_null($zone)) {
        return $this->sendError('Zone not found.');
        };
        return response()->json([
            "success" => true,
            "message" => "Zone retrieved successfully.",
            "data" => $zone
        ]);
    }

    public function update(Request $request, $id )
    {
        $input = $request->all();
        $zone = Zone::find($id);
        $validator = Validator::make($input, [
            'zone_name' => 'required'
        ]);
        
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $zone->zone_name = $input['zone_name'];
        $zone->save();
        
        return response()->json([
            "success" => true,
            "message" => "Zone updated successfully.",
            "data" => $zone
        ]);
    }

    public function edit(Zone $zone)
    {
        //
    }

    public function destroy($id)
    {
        $zone = Zone::find($id); 
        $zone->delete();
        return response()->json([
            "success" => true,
            "message" => "Zone deleted successfully.",
            "data" => $zone
        ]);
    }
}
