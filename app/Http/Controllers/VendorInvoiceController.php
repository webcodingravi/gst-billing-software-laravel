<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Models\VendorInvoice;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendorInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $vendor_bills = VendorInvoice::latest('id')->with('party');

       
        if(!empty($request->keyword)) {
            $vendor_bills = $vendor_bills->whereHas('party', function($query) use($request) {
                // Query the name field in status table
                $query->where('full_name', 'like', '%'.$request->keyword.'%'); // '=' is optiona

            });
          };

          
          $vendor_bills = $vendor_bills->paginate(10);


       return view('vendor-invoice.vendor-list',[
          'vendor_bills' => $vendor_bills
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('vendor-invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'phone_no' => 'required|numeric',
            'invoice_no' => 'required',
            'address' => 'required',
            'invoice_date' => 'required',
            'account_holder_name' => 'required',
            'account_no' => 'required|numeric',
            'bank_name' => 'required',
            'ifsc_code' => 'required',
            'branch_address' => 'required',
            'item_description' => 'required',
            'total_amount' => 'required|numeric',
            
              
        ]);

        if($validator->fails()) {
          return redirect()->back()->withInput()->withErrors($validator);
        }


       $party = DB::table('parties')
       ->where('party_type', 'vendor')
       ->where(['full_name' => $request->full_name, 'phone_no' => $request->phone_no])->first();

       if(!empty($party)) {
        $party_id = $party->id;
       }else{
        // create new party
        $newParty = [
             'party_type' => 'vendor',
             'full_name' => $request->full_name,
              'phone_no' => $request->phone_no,
              'address' => $request->address,
              'account_holder_name' => $request->account_holder_name,
              'account_no' => $request->account_no,
              'bank_name' => $request->bank_name,
              'ifsc_code' => $request->ifsc_code,
              'branch_address' => $request->branch_address,

        ];

        $party_id = DB::table('parties')->insertGetId($newParty);
       }

    //    Create vendor invoice

    $vendorInvoice = [
        'party_id' => $party_id,
        'invoice_date' => $request->invoice_date,
        'invoice_no' => $request->invoice_no,
        'item_description' => $request->item_description,
        'total_amount' => $request->total_amount,
        'account_holder_name' => $request->account_holder_name,
        'account_no' => $request->account_no,
        'bank_name' => $request->bank_name,
        'ifsc_code' => $request->ifsc_code,
        'branch_address' => $request->branch_address,
        'declaration' => $request->declaration,
        'created_at' => Carbon::now()


    ];

    $invoice_id = DB::table('vendor_invoices')->insertGetId($vendorInvoice);

    if($invoice_id) {
       return redirect()->route('vendor-invoice.show',$invoice_id); 
    }else{
        return redirect()->back()->withError("Something went wrong, please try again"); 
 
    }

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $vendorInvoice = VendorInvoice::where('id', $id)->with('party')->first();
       return view('vendor-invoice.vendor-show',[
        'vendorInvoice' => $vendorInvoice
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
