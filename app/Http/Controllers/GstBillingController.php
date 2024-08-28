<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\GstBill;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use Illuminate\Support\Facades\Validator;

class GstBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gst_bills = GstBill::orderBy('created_at','DESC')->with('party');

     

          if(!empty($request->keyword)) {
            $gst_bills  =  $gst_bills ->whereHas('party', function($query) use($request) {
                // Query the name field in status table
                $query->where("full_name", 'like', '%'.$request->keyword.'%'); // '=' is optiona

            });

        }

          

          
        $gst_bills = $gst_bills->paginate(10);

    
        return view('gst-billing.manage-bill',[
            'gst_bills' => $gst_bills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parties = Party::where('party_type','client')->orderBy('full_name')->get();
        return view('gst-billing.create-bill',[
            'parties' => $parties
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'party_id' => 'required|exists:parties,id',
             'invoice_date' => 'required|date',
             'invoice_no' => 'required|unique:gst_bills,invoice_no',
              'total_amount' => 'required|numeric',
              'cgst_amount' => 'required|numeric',
              'sgst_amount' => 'required|numeric',
              'tax_amount' => 'required|numeric',
              'net_amount' => 'required|numeric',
              
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

            $gst_bills = new GstBill(); 
            $gst_bills->party_id = $request->party_id;
            $gst_bills->invoice_date = $request->invoice_date;
            $gst_bills->invoice_no = $request->invoice_no;
            $gst_bills->item_description = $request->item_description;
            $gst_bills->total_amount = $request->total_amount;
            $gst_bills->cgst_rate = $request->cgst_rate;
            $gst_bills->sgst_rate = $request->sgst_rate;
            $gst_bills->igst_rate = $request->igst_rate;
            $gst_bills->cgst_amount = $request->cgst_amount;
            $gst_bills->sgst_amount = $request->sgst_amount;
            $gst_bills->igst_amount = $request->igst_amount;
            $gst_bills->tax_amount = $request->tax_amount;
            $gst_bills->net_amount = $request->net_amount;
            $gst_bills->declaration = $request->declaration;
            $gst_bills->save();

            session()->flash('success', 'Gst Bill added Successfully');
            return response()->json([
                'status' => true,
            ]);
        
    }

    /**
     * Display the specified resource.
     */
    // Print gst bill
    public function show(string $id)
    {
        
        $company_details = CompanyDetail::first();
        $gst_bills = GstBill::where('id',$id)->with('party',)->first(); 
        
        return view('gst-billing.print-gstBill',[
        'company_details' => $company_details,
        'gst_bills' => $gst_bills
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parties = Party::where('party_type','client')->orderBy('full_name')->get();

        $gst_bills = GstBill::findOrFail($id);

        return view('gst-billing.edit-bill',[
            'parties' => $parties,
            'gst_bills' => $gst_bills
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $gst_bills = GstBill::findOrFail($id);

        
        $validator = Validator::make($request->all(),[
            'party_id' => 'required|exists:parties,id',
            'invoice_no' => 'required|unique:gst_bills,invoice_no,'.$id.'',
              'total_amount' => 'required|numeric',
              'cgst_amount' => 'required|numeric',
              'sgst_amount' => 'required|numeric',
              'tax_amount' => 'required|numeric',
              'net_amount' => 'required|numeric',
              
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

            $gst_bills->party_id = $request->party_id;
            $gst_bills->invoice_date = $request->invoice_date;
            $gst_bills->invoice_no = $request->invoice_no;
            $gst_bills->item_description = $request->item_description;
            $gst_bills->total_amount = $request->total_amount;
            $gst_bills->cgst_rate = $request->cgst_rate;
            $gst_bills->sgst_rate = $request->sgst_rate;
            $gst_bills->igst_rate = $request->igst_rate;
            $gst_bills->cgst_amount = $request->cgst_amount;
            $gst_bills->sgst_amount = $request->sgst_amount;
            $gst_bills->igst_amount = $request->igst_amount;
            $gst_bills->tax_amount = $request->tax_amount;
            $gst_bills->net_amount = $request->net_amount;
            $gst_bills->declaration = $request->declaration;
            $gst_bills->save();

            session()->flash('success', 'Gst Bill Updated Successfully');
            return response()->json([
                'status' => true,
            ]);
        
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gst_bills = GstBill::findOrFail($id); 

        $gst_bills->delete();

        session()->flash('success', 'Gst Bill deleted Successfully');
        return response()->json([
            'status' => true,
        ]);
    }



   
}
