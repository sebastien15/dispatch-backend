<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class ApiDriverController extends Controller
{
    
    public function index()
    {
        $drivers = Driver::all();
        return response()->json([
            "success" => true,
            "message" => "drivers list",
            "data"    => $drivers
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
            'driver_no' => 'required',
            'pda_pass' => 'required',
            'has_pda' => 'required',
            'rent_paid' => 'required',
            'active' => 'required',
            'pda_mobile_no' => 'required',
            'driver_name' => 'required',
            'email' => 'required',
            'tel_no' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'mobile_no' => 'required',
            'ni' => 'required',
            'driver_type' => 'required',
            'driver_monthly_rent' => 'required',
            'photo' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $driver = Driver::create($input);
        return response()->json([
            "success" => true,
            "message" => "driver created successfully",
            "data"    => $driver
        ]);
    }

    public function show( $id)
    {
        $driver = Driver::find($id);
        
        if (is_null($driver)) {
        return $this->sendError('driver not found.');
        };
        return response()->json([
            "success" => true,
            "message" => "driver retrieved successfully.",
            "data" => $driver
        ]);
    }

    public function edit(Driver $driver)
    {
        //
    }

    public function update(Request $request, Driver $driver)
    {
        $input = $request->all();
        $zone = Driver::find($id);
        $validator = Validator::make($input, [
            'driver_no' => 'required',
            'pda_pass' => 'required',
            'has_pda' => 'required',
            'rent_paid' => 'required',
            'active' => 'required',
            'pda_mobile_no' => 'required',
            'driver_name' => 'required',
            'email' => 'required',
            'tel_no' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'mobile_no' => 'required',
            'ni' => 'required',
            'driver_type' => 'required',
            'driver_monthly_rent' => 'required',
            'photo' => 'required'
        ]);
        
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $driver->driver_no = $input['driver_no'];
        $driver->pda_pass = $input['pda_pass'];
        $driver->has_pda = $input['has_pda'];
        $driver->rent_paid = $input['rent_paid'];
        $driver->active = $input['active'];
        $driver->pda_mobile_no = $input['pda_mobile_no'];
        $driver->driver_name = $input['driver_name'];
        $driver->email = $input['email'];
        $driver->tel_no = $input['tel_no'];
        $driver->address = $input['address'];
        $driver->dob = $input['dob'];
        $driver->mobile_no = $input['mobile_no'];
        $driver->ni = $input['ni'];
        $driver->driver_type = $input['driver_type'];
        $driver->driver_monthly_rent = $input['driver_monthly_rent'];
        $driver->photo = $input['photo'];
        $driver->save();
        
        return response()->json([
            "success" => true,
            "message" => "driver updated successfully.",
            "data" => $driver
        ]);
    }

    public function destroy(Driver $driver)
    {
        $driver = Driver::find($id); 
        $driver->delete();
        return response()->json([
            "success" => true,
            "message" => "driver deleted successfully.",
            "data" => $driver
        ]);
    }
}
