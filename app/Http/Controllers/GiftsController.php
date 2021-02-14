<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftsController extends Controller
{
    public function create()
    {

        return view('gifts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'gift' => 'required|max:25',
            'explain' => 'required|max:25',
        ]);
        
        $request->user()->gifts()->create([
            'gift' => $request->gift,
            'expalin' => $request->explain,
            ]);
            
            return redirect('/');
    }
}
