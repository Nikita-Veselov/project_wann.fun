<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $admins = ['Edmin', 'Nik'];
    public $linkOptions = [
        'date_me',
        'kiss_me', 
        'wanna_date_me', 
        'please_date_me', 
        'chill_with_me', 
        'my_photos', 
        'my_pics', 
        'pills', 
        'magic_pills', 
        'power_pills', 
        'gel', 
        'titan_gel', 
        'super_gel', 
        'get_size', 
        'get_size_you_deserve',
        
    ];
}
