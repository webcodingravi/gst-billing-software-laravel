<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\GstBill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $totalRevenue = GstBill::sum('total_amount');
        $TaxAmount = GstBill::sum('tax_amount');
        $totalClient = Party::where('party_type','=','client')->count();
        $totalVendor = Party::where('party_type','=','vendor')->count();

    // Last 30 days Total Revenue

    $lastThirtyDayStartDays = Carbon::now()->subDays(30)->format('Y-m-d');

    $currentDate = Carbon::now()->format('Y-m-d');


    $revenueLastThirtyDays = GstBill::whereDate('created_at', '>=',$lastThirtyDayStartDays)
                    ->whereDate('created_at', '<=',$currentDate)
                    ->sum('total_amount');


   // Last 30 days Tax Amount

    $TaxAmountLastThirtyDays = GstBill::whereDate('created_at', '>=',$lastThirtyDayStartDays)
                    ->whereDate('created_at', '<=',$currentDate)
                    ->sum('tax_amount');


        return view('dashboard',[
            'totalRevenue' => $totalRevenue,
            'TaxAmount' => $TaxAmount,
            'totalClient' => $totalClient,
            'totalVendor' => $totalVendor,
            'revenueLastThirtyDays' => $revenueLastThirtyDays,
            'TaxAmountLastThirtyDays' => $TaxAmountLastThirtyDays
        ]);
    }




}
