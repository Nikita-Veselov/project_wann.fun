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

        $visitorsChart = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();

        $visitorCount = $visitors->map(function($item, $key) {
            return $item->geo;
        });
        $visitorCount = $visitorCount->countBy();

        foreach ($visitorsChart as $data)
        {
            array_push($chart_data, array($data->date->format('d.m.Y'), $data->total));
        }

        if (in_array(Auth::user()->name, $admins)) {
            return view('admin.dashboard', compact(['visitorsChart', 'chart_data', 'links', 'users', 'visitors', 'visitorCount']));    
        } else {
           return redirect()->to('/'); 
        }

        
    }
}
