<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Models\Link;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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
        $input['input_url'] =  'https://wann.fun/link/' . $request->input_url . '_123';
        $input['user_id'] = 'guest';
        
        $link = Link::create($input);

        if($link) {
            return back()
            ->with('success', 'Report addition success');
        }
    
        return back()->with('error', 'Report addition error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_url = url()->current();
        $link = Link::firstWhere('input_url', $current_url);
        // dd($link->output_url);
        return redirect()->away($link->output_url);
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

