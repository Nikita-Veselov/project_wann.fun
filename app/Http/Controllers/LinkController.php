<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/link');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLink $request)
    {
        $input = $request->all();
        $input['input_url'] =  'https://wann.fun/' . $request->input_url . '_'. Str::random(5);
        $input['user_id'] = 'guest';

        
        // dd($link);
        if(Link::create($input)) {
            return redirect()->route('link')->with([
                'success'=> 'Link created successfully!',
                'url' => $input["input_url"]
            ]);
        }
    
        return back()->with('error', 'Creation error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $current_url = url()->current();
        if ($link = Link::firstWhere('input_url', $current_url)){
            return redirect()->away($link->output_url);
        }
        return redirect()->route('link');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

