<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator;
use App\Payment_gateway;

class ApiPaymentGatewayController extends Controller
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
        $paymentGateways = Payment_gateway::all();
        return response()->json([
            "status" => "200",
            "success" => true,
            "message" => "paymentGateways list",
            "data"    => $paymentGateways
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
            'paymentGateway_name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError(201,"saving paymentGateway denied", $validator->errors());
        }
        $paymentGateway = Payment_gateway::create($input);
        return response()->json([
            "success" => true,
            "message" => "paymentGateway created successfully",
            "data"    => $paymentGateway
        ]);
    }

    
    public function show($id)
    {
        $paymentGateway = Payment_gateway::find($id);
            
            if (is_null($paymentGateway)) {
            return $this->sendError(404,'Payment_gateway not found.');
            };

            return response()->json([
                "status"=> "201",
                "success" => true,
                "message" => "Payment_gateway retrieved successfully.",
                "data" => $paymentGateway
            ]);
    }

    
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $paymentGateway = Payment_gateway::find($id);
        $validator = Validator::make($input, [
            'paymentGateway_name' => 'required'
        ]);

        if (is_null($paymentGateway)) {
            return $this->sendError(404,'Payment_gateway not found.',"");
        };
        if($validator->fails()){
        return $this->sendError(201,"update paymentGateway denied", $validator->errors());       
        }
        
        $paymentGateway->paymentGateway_name = $input['paymentGateway_name'];
        $paymentGateway->save();
        
        return response()->json([
            "success" => true,
            "message" => "Payment_gateway updated successfully.",
            "data" => $paymentGateway
        ]);
    }

    
    public function destroy($id)
    {
        $paymentGateway = Payment_gateway::find($id); 
        $paymentGateway->delete();
        return response()->json([
            "success" => true,
            "message" => "Payment_gateway deleted successfully.",
            "data" => $paymentGateway
        ]);
    }
}
