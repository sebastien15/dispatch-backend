<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Validator;

class ApiDocumentController extends Controller
{

    public function index()
    {
        $documents = Document::all();
        return response()->json([
            "success" => true,
            "message" => "Documents list",
            "data"    => $documents
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
            'doc_title' => 'required',
            'expiry_date' => 'required',
            'file' => 'required',
            'driver_id' => 'required'
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $document = Document::create($input);
        return response()->json([
            "success" => true,
            "message" => "document created successfully",
            "data"    => $document
        ]);
    }
// 'doc_title','expiry_date','file', 'driver_id'

    public function show($id)
    {
        $document = Document::find($id);
        
        if (is_null($document)) {
        return $this->sendError('document not found.');
        };
        return response()->json([
            "success" => true,
            "message" => "$document retrieved successfully.",
            "data" => $document
        ]);
    }

    public function edit(Document $document)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $document = Document::find($id);
        $validator = Validator::make($input, [
            'doc_title' => 'required',
            'expiry_date' => 'required',
            'file' => 'required',
            'driver_id' => 'required'
        ]);
        
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $document->doc_title = $input['doc_title'];
        $document->expiry_date = $input['expiry_date'];
        $document->file = $input['file'];
        $document->driver_id = $input['driver_id'];
        $document->save();
        
        return response()->json([
            "success" => true,
            "message" => "document updated successfully.",
            "data" => $document
        ]);
    }

    public function destroy(Document $document)
    {
        $document = Document::find($id); 
        $document->delete();
        return response()->json([
            "success" => true,
            "message" => "document deleted successfully.",
            "data" => $document
        ]);
    }
}
