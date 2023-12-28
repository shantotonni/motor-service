<?php

namespace App\Http\Controllers\Api\V1;

use App\CustomerToken;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobCard as JobCardResource;
use App\JobCard;
use Illuminate\Http\Request;

class CustomerJobCardController extends Controller
{
    public function customerJobList(Request $request){
        $token = str_replace("token ","",$request->header('Authorization'));
        $customer_token = CustomerToken::where("token",$token)->first();
        if(!$customer_token){ return response()->json(['error'=>"Unauthorized"],401);}

        $job_list = JobCard::where('customer_id',$customer_token->customer_id)->with('service_type','customer','section','area','product','technitian','call_type')->get();
        return JobCardResource::collection($job_list);
    }

}
