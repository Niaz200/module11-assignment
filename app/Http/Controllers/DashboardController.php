<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Index(){
        $today=DB::table('invoices')->whereDate('created_at', Carbon::today())->sum('price');
        $yeasterday=DB::table('invoices')->whereDay('created_at', Carbon::yesterday())->sum('price');
        // $month=DB::table('invoices')->whereMonth('created_at', Carbon::today()->month)->sum('price');
        $thismonth=DB::table('invoices')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('price');

        $lastmonth=DB::table('invoices')
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->sum('price');    
        return view('admin.dashboard',compact('today','yeasterday','thismonth','lastmonth'));
    }



    
}
