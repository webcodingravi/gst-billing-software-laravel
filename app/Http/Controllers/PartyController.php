<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $parties = Party::orderBy('created_at', 'DESC');
      if(!empty($request->keyword)) {
        $parties = $parties->where('full_name', 'like', '%'.$request->keyword.'%');
      };



      $parties =  $parties->paginate(10);
       return view('party.party-list',[
        'parties'  => $parties
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('party.add-party');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
               'party_type' => 'required',
               'full_name' => 'required|string|min:2|max:20',
               'phone_no' => 'required|numeric|min:10',
               'address' => 'required|max:255',
               'account_holder_name' => 'required|string|min:2|max:20',
               'account_no' => 'required|numeric',
               'bank_name' => 'required|max:255',
               'ifsc_code' => 'required|max:50',
               'branch_address' => 'required|max:255',


        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
       $party = new Party();
       $party->party_type = $request->party_type;
       $party->full_name = $request->full_name;
       $party->phone_no = $request->phone_no;
       $party->address = $request->address;
       $party->account_holder_name = $request->account_holder_name;
       $party->account_no = $request->account_no;
       $party->bank_name = $request->bank_name;
       $party->ifsc_code = $request->ifsc_code;
       $party->branch_address = $request->branch_address;
       $party->save();


       session()->flash('success', 'New party add successfully');
       return response()->json([
              'status' => true
       ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $party = Party::findOrFail($id);
       return view('party.edit-party',[
           'party' => $party
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $party = Party::findOrFail($id);

        {
            $validator = Validator::make($request->all(),[
                'party_type' => 'required',
                'full_name' => 'required|string|min:2|max:20',
                'phone_no' => 'required|numeric|min:10',
                'address' => 'required|max:255',
                'account_holder_name' => 'required|string|min:2|max:20',
                'account_no' => 'required|numeric',
                'bank_name' => 'required|max:255',
                'ifsc_code' => 'required|max:50',
                'branch_address' => 'required|max:255',
    
    
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ]);
            }
           $party->party_type = $request->party_type;
           $party->full_name = $request->full_name;
           $party->phone_no = $request->phone_no;
           $party->address = $request->address;
           $party->account_holder_name = $request->account_holder_name;
           $party->account_no = $request->account_no;
           $party->bank_name = $request->bank_name;
           $party->ifsc_code = $request->ifsc_code;
           $party->branch_address = $request->branch_address;
           $party->save();
    
    
           session()->flash('success', ' party updated successfully');
           return response()->json([
                  'status' => true
           ]);
    }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $party = Party::findOrFail($id);

        $party->delete();

        session()->flash("success", 'Party deleted successfully');
        return response()->json([
            'status' => true
     ]);


    }
}
