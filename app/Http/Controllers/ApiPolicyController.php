<?php

namespace App\Http\Controllers;

use App\Policy;
use Illuminate\Http\Request;


class ApiPolicyController extends Controller
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
        $Policys = Policy::all();
        return response()->json([
            "status" => "200",
            "success" => true,
            "message" => "Policys list",
            "data"    => $Policys
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $Policy = Policy::create($input);
        return response()->json([
            "success" => true,
            "message" => "Policy created successfully",
            "data"    => $Policy
        ]);
    }

    
    public function show($id)
    {
        $Policy = Policy::find($id);
            
            if (is_null($Policy)) {
            return $this->sendError(404,'Policy not found.');
            };

            return response()->json([
                "status"=> "201",
                "success" => true,
                "message" => "Policy retrieved successfully.",
                "data" => $Policy
            ]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Policy = Policy::find($id);

        if (is_null($Policy)) {
            return $this->sendError(404,'Policy not found.',"");
        };
        
        $Policy->driver_expiry_date             = $input['driver_expiry_date'];
        $Policy->booking_expiry_date            = $input['booking_expiry_date'];
        $Policy->airport_booking_expiry_date    = $input['airport_booking_expiry_date'];
        $Policy->airport_pickup_charges         = $input['airport_pickup_charges'];
        $Policy->driver_commission_per_booking  = $input['driver_commission_per_booking'];
        $Policy->driver_monthly_rent            = $input['driver_monthly_rent'];
        $Policy->pickup_commission_from_charges = $input['pickup_commission_from_charges'];
        $Policy->no_commission_in_acc_jobs     = $input['no_commission_in_acc_jobs'];
        $Policy->round_mileage_fares           = $input['round_mileage_fares'];
        $Policy->apply_start_rate_within       = $input['apply_start_rate_within'];
        $Policy->show_booking_other_charges    = $input['show_booking_other_charges'];
        $Policy->credit_card_extra_charges     = $input['credit_card_extra_charges'];
        $Policy->discount_for_return_journey   = $input['discount_for_return_journey'];
        $Policy->discount_for_W_R_journey      = $input['discount_for_W_R_journey'];
        $Policy->enable_POI                    = $input['enable_POI'];
        $Policy->enable_booking_quotation      = $input['enable_booking_quotation'];
        $Policy->enable_onBoard_driver         = $input['enable_onBoard_driver'];
        $Policy->enable_offPeak_time_fare      = $input['enable_offPeak_time_fare'];
        $Policy->enable_advance_booking_text   = $input['enable_advance_booking_text'];
        $Policy->enable_passenger_text         = $input['enable_passenger_text'];
        $Policy->enable_booking_due_alert      = $input['enable_booking_due_alert'];
        $Policy->todays_booking                = $input['todays_booking'];
        $Policy->recent_booking                = $input['recent_booking'];
        $Policy->paging_size                   = $input['paging_size'];
        $Policy->grid_row_size                 = $input['grid_row_size'];
        $Policy->cash_call_charges             = $input['cash_call_charges'];
        $Policy->enable_web_booking            = $input['enable_web_booking'];
        $Policy->web_booking_authorization     = $input['web_booking_authorization'];
        $Policy->web_accounts                  = $input['web_accounts'];
        $Policy->mobile_booking_authorization  = $input['mobile_booking_authorization'];
        $Policy->save();
        
        return response()->json([
            "success" => true,
            "message" => "Policy updated successfully.",
            "data" => $Policy
        ]);
    }

    
    public function destroy($id)
    {
        $Policy = Policy::find($id); 
        $Policy->delete();
        return response()->json([
            "success" => true,
            "message" => "Policy deleted successfully.",
            "data" => $Policy
        ]);
    }
}
