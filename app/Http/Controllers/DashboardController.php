<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Link;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {   
        $ctr = new Controller;
        $admins = $ctr->admins;
        $linkOptions = $ctr->linkOptions;

        $users = User::all();
        $links = Link::all();
        $visitors = Visitor::all();
        $visitorsToday = Visitor::where('date', '=', today())->get();
        $visitorsChart = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $visitorsCount = Visitor::all()->countby('geo');

        $chart_data = array();

        $clicks = Click::all();

        $linkOptionsCount = [];
        foreach ($linkOptions as $option) {
            $count = 0;  
            foreach ($links as $link) {
                if (Str::contains($link->input_url, $option)) {
                    $count++;
                }
            }
            array_push($linkOptionsCount, [$option => $count]);
        }
        $linkOptionsCount = collect($linkOptionsCount);

        foreach ($visitorsChart as $data)
        {
            array_push($chart_data, array($data->date->format('d.m.Y'), $data->total));
        }

        if (in_array(Auth::user()->name, $admins)) {
            return view('admin.dashboard', compact([
                'chart_data', 
                'links', 
                'users', 
                'visitors', 
                'visitorsToday', 
                'visitorsCount',
                'visitorsChart',
                'clicks',
                'linkOptionsCount'
            ]));    
        } else {
           return redirect()->to('/'); 
        }

        
    }
}
