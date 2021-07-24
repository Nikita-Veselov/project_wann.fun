<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Http\Requests\UpdateLink;
use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location as Location;

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
        return view('main');
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

        $input['input_url'] =  $request->input_url . '_'. Str::random(5);
        if (Auth::check()) {
            $input['user_id'] = Auth::user()->email;
        } else {
            $input['user_id'] = 'guest';
        }
        
        if(Link::create($input)) {
            $input['input_url'] = "wann.fun/" . $input['input_url'];
            return redirect()->route('main')->with([
                'success'=> 'Link created successfully!',
                'url' => $input["input_url"]
            ]);
        }
    
        return back()->with('error', 'Link creation error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link = Link::where('id', $id)->first();
        $stats = Click::where('link', $link->input_url)->get();

        return view('show', [
            'link' => $link,
            'stats' => $stats
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::where('id', $id)->first();
        return view('edit', [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLink $request, $id)
    {
        $link = Link::where('id', $id)->first();
        
        Click::where('link', $link->input_url)->update(['link' => $request->input_url]);

        if($link->update([
            'input_url' => $request->input_url, 
            'output_url' => $request->output_url])) 
            {
                return redirect()->route('profile')
                    ->with('success', 'News edition success');
            }
    
        return back()->with('error', 'News edition error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();

        return redirect()->route('profile');
    }

    public function redirect(String $slug, Request $request) {
        if ($link = Link::where('input_url', $slug)->first()){
            
            $geo = Location::get($request->ip());
            
            Click::create(['link' => $link->input_url, 'ip' => $request->ip(), 'geo' => $geo->country]);

            return redirect()->away($link->output_url);
        }
        return redirect()->route('main');
    }
}

