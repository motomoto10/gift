<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftfavoriteController extends Controller
{
    public function store($gift_id)
    {
        \Auth::user()->favorite($gift_id);
        
        return back();
    }
    
    public function destroy($gift_id)
    {
        \Auth::user()->unfavorite($gift_id);
        
        return back();
    }
}
