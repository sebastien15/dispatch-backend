<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Validator;

class ApiCustomerController extends Controller
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
        $customers = Customer::all();
        return response()->json([
            "status" => "200",
            "success" => true,
            "message" => "customers list",
            "data"    => $customers
        ]);
    }

    public function create($id)
    {
        //
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name' => 'required',
            'email' => 'required',
            'tel_no' => 'required',
            'blacklist' => 'required',
            'mobile_no' => 'required',
            'fax' => 'required',
            'door_no' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError(201,"saving customer denied", $validator->errors());
        }
        $customer = Customer::create($input);
        return response()->json([
            "success" => true,
            "message" => "customer created successfully",
            "data"    => $customer
        ]);
    }

    
    public function show($id)
    {
        $customer = Customer::find($id);
            
        if (is_null($customer)) {
        return $this->sendError(404,'Customer not found.');
        };

        return response()->json([
            "status"=> "201",
            "success" => true,
            "message" => "Customer retrieved successfully.",
            "data" => $customer
        ]);
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $customer = Customer::find($id);
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'tel_no' => 'required',
            'blacklist' => 'required',
            'mobile_no' => 'required',
            'fax' => 'required',
            'door_no' => 'required'
        ]);

        if (is_null($customer)) {
            return $this->sendError(404,'Customer not found.',"");
        };
        if($validator->fails()){
        return $this->sendError(201,"update customer denied", $validator->errors());       
        }
        
        $customer->name = $input['name'];
        $customer->email = $input['email'];
        $customer->tel_no = $input['tel_no'];
        $customer->blacklist = $input['blacklist'];
        $customer->mobile_no = $input['mobile_no'];
        $customer->fax = $input['fax'];
        $customer->door_no = $input['door_no'];
        $customer->address1 = $input['address1'];
        $customer->address2 = $input['address2'];
        $customer->save();
        
        return response()->json([
            "success" => true,
            "message" => "Customer updated successfully.",
            "data" => $customer
        ]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id); 
        $customer->delete();
        return response()->json([
            "success" => true,
            "message" => "Customer deleted successfully.",
            "data" => $customer
        ]);
    }
}
