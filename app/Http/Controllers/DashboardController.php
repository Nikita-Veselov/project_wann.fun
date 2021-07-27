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
        
    
        $admins = ['Никита Веселов', 'Edmin'];
        
        $users = User::all();
        $links = Link::all();
        
        $visitors = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();
        
        foreach ($visitors as $data)
        {
            array_push($chart_data, array($data->date->format('d.m.Y'), $data->total));
        }

        if (in_array(Auth::user()->name, $admins)) {
            return view('admin.dashboard', compact(['visitors', 'chart_data', 'links', 'users']));    
        } else {
           return redirect()->to('/'); 
        }

        
    }
}
