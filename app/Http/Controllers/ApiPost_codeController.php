<?php

namespace App\Http\Controllers;

use App\Post_code;
use Illuminate\Http\Request;
use Validator;

class ApiPost_codeController extends Controller
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
        $post_codes = Post_code::all();
        return response()->json([
            "success" => true,
            "message" => "post_codes list",
            "data"    => $post_codes
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'post_code' => 'required',
            'zone_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError(201,'Failed to save post code.', $validator->errors());
        }
        $post_code = Post_code::create($input);
        return response()->json([
            "success" => true,
            "message" => "post_code created successfully",
            "data"    => $post_code
        ]);
    }

    public function show($id)
    {
        $post_code = Post_code::find($id);
        
        if (is_null($post_code)) {
        return $this->sendError(404, "post_code not found.","");
        };
        return response()->json([
            "success" => true,
            "message" => "post_code retrieved successfully.",
            "data" => $post_code
        ]);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post_code = Post_code::find($id);
        $validator = Validator::make($input, [
            'post_code' => 'required',
            'zone_id' => 'required'
        ]);
        if (is_null($post_code)) {
            return $this->sendError(404,'Post code not found.',"");
        };
        if($validator->fails()){
            return $this->sendError(201,'Failed to save post code.', $validator->errors());
        }
        
        $post_code->post_code = $input['post_code'];
        $post_code->zone_id = $input['zone_id'];
        $post_code->save();
        
        return response()->json([
            "success" => true,
            "message" => "post_code updated successfully.",
            "data" => $post_code
        ]);
    }

    public function destroy( $id)
    {
        $post_code = Post_code::find($id); 
        $post_code->delete();
        return response()->json([
            "success" => true,
            "message" => "post_code deleted successfully.",
            "data" => $post_code
        ]);
    }
}
