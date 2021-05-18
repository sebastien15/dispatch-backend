<?php

namespace App\Http\Controllers;

use App\Driver_availability;
use Illuminate\Http\Request;

class ApiDriver_availabilityController extends Controller
{

    public function index()
    {
        $driver_availability = Driver_availability::all();
        return response()->json([
            "success" => true,
            "message" => "driver_availability list",
            "data"    => $driver_availability
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
            'driver_id' => 'required',
            'become_available' => 'required',
            'ending_time' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $vehicle_availabity = Driver_availability::create($input);
        return response()->json([
            "success" => true,
            "message" => "vehicle_availabity created successfully",
            "data"    => $vehicle_availabity
        ]);
    }
 
    public function show($id)
    {
        $driver_availability = Driver_availability::find($id);
        
        if (is_null($driver_availability)) {
        return $this->sendError('driver_availability not found.');
        };
        return response()->json([
            "success" => true,
            "message" => "driver_availability retrieved successfully.",
            "data" => $driver_availability
        ]);
    }

    public function edit(Driver_availability $driver_availability)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $driver_availability = Driver_availability::find($id);
        $validator = Validator::make($input, [
            'driver_id'        => 'required',
            'become_available' => 'required',
            'ending_time'      => 'required'
        ]);
        
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $driver_availability->driver_id = $input['driver_id'];
        $driver_availability->become_available = $input['become_available'];
        $driver_availability->ending_time = $input['ending_time'];
        $driver_availability->save();
        
        return response()->json([
            "success" => true,
            "message" => "driver_availability updated successfully.",
            "data" => $driver_availability
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver_availability  $driver_availability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver_availability $driver_availability)
    {
        $driver_availability = Driver_availability::find($id); 
        $driver_availability->delete();
        return response()->json([
            "success" => true,
            "message" => "$driver_availability deleted successfully.",
            "data" => $driver_availability
        ]);
    }
}
