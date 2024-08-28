<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyDetailController extends Controller
{


   public function CompanyDetail() {
    $company_detail = CompanyDetail::findOrFail(Auth::user()->id);
    return view('company_details.company-detail',[
         'company_detail' => $company_detail
    ]);
   }


   public function processCompanyDetail(Request $request) {

    $validator = Validator::make($request->all(), [
        'company_name' => 'required',
        'address' => 'required',
        'email' => 'required|email',
        'mobile_no' => 'required|numeric'

    ]);

    if($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }
    
    $company_detail = CompanyDetail::findOrFail(Auth::user()->id);
    $company_detail->company_name = $request->company_name;
    $company_detail->address = $request->address;
    $company_detail->email = $request->email;
    $company_detail->mobile_no = $request->mobile_no;
    $company_detail->website = $request->website;
    $company_detail->gst_no = $request->gst_no;
    $company_detail->bank_name = $request->bank_name;
    $company_detail->account_no = $request->account_no;
    $company_detail->ifsc_code = $request->ifsc_code;

    $company_detail->save();

    return redirect()->back()->with('success', 'company details updated successfully');


   }
}
