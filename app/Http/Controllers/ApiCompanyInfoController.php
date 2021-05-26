<?php

namespace App\Http\Controllers;

use App\Company_info;
use Illuminate\Http\Request;
use Validator;

class ApiCompanyInfoController extends Controller
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
        $company_infos = Company_info::all();
        return response()->json([
            "status" => "200",
            "success" => true,
            "message" => "company_infos list",
            "data"    => $company_infos
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
            'name' => 'required',
            'tel_no' => 'required',
            'emergency_contact' => 'required',
            'email' => 'required',
            'fax' => 'required',
            'website' => 'required',
            'address' => 'required',
            'bg_color' => 'required',
            'map_icon' => 'required',
            'photo' => 'required',
            'sort_code' => 'required',
            'acc_no' => 'required',
            'bank' => 'required',
            'company_nbr' => 'required',
            'VAT_nbr' => 'required',
            'IBAN' => 'required',
            'BLC' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError(201,"saving company_info denied", $validator->errors());
        }
        $company_info = Company_info::create($input);
        return response()->json([
            "success" => true,
            "message" => "company_info created successfully",
            "data"    => $company_info
        ]);
    }

    
    public function show($id)
    {
        $company_info = Company_info::find($id);
            
            if (is_null($company_info)) {
            return $this->sendError(404,'Company_info not found.');
            };

            return response()->json([
                "status"=> "201",
                "success" => true,
                "message" => "Company_info retrieved successfully.",
                "data" => $company_info
            ]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $company_info = Company_info::find($id);
        $validator = Validator::make($input, [
            'name' => 'required',
            'tel_no' => 'required',
            'emergency_contact' => 'required',
            'email' => 'required',
            'fax' => 'required',
            'website' => 'required',
            'address' => 'required',
            'bg_color' => 'required',
            'map_icon' => 'required',
            'photo' => 'required',
            'sort_code' => 'required',
            'acc_no' => 'required',
            'bank' => 'required',
            'company_nbr' => 'required',
            'VAT_nbr' => 'required',
            'IBAN' => 'required',
            'BLC' => 'required',
        ]);

        if (is_null($company_info)) {
            return $this->sendError(404,'Company_info not found.',"");
        };
        if($validator->fails()){
        return $this->sendError(201,"update company_info denied", $validator->errors());       
        }
        
        $company_info->name = $input['name'];
        $company_info->tel_no = $input['tel_no'];
        $company_info->emergency_contact = $input['emergency_contact'];
        $company_info->email = $input['email'];
        $company_info->fax = $input['fax'];
        $company_info->website = $input['website'];
        $company_info->address = $input['address'];
        $company_info->bg_color = $input['bg_color'];
        $company_info->map_icon = $input['map_icon'];
        $company_info->photo = $input['photo'];
        $company_info->sort_code = $input['sort_code'];
        $company_info->acc_no = $input['acc_no'];
        $company_info->bank = $input['bank'];
        $company_info->company_nbr = $input['company_nbr'];
        $company_info->VAT_nbr = $input['VAT_nbr'];
        $company_info->IBAN = $input['IBAN'];
        $company_info->BLC = $input['BLC'];
        $company_info->save();
        
        return response()->json([
            "success" => true,
            "message" => "Company_info updated successfully.",
            "data" => $company_info
        ]);
    }

   
    public function destroy($id)
    {
        $company_info = Company_info::find($id); 
        if (empty($paymentGateway)) {
            return $this->sendError(404," company_info with $id not found",[]);
        }
        $company_info->delete();
        return response()->json([
            "success" => true,
            "message" => "Company_info deleted successfully.",
            "data" => $company_info
        ]);
    }
}
