<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {   
        
        $admins = (new Controller)->admins;
        
        
        $users = User::all();
        $links = Link::all();
        $visitors = Visitor::all();
        $visitorsToday = Visitor::where('date', '=', today())->get();
        $visitorsChart = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();

        $visitorsCount = $visitors->map(function($item, $key) {
            return $item->geo;
        });
        $visitorsCount = $visitorsCount->countBy();

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
            ]));    
        } else {
           return redirect()->to('/'); 
        }

        
    }
}
