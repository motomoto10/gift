<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;


class GiftsController extends Controller
{
    public function index()
    {
        $gifts = Gift::orderBy('id', 'desc')->paginate(20);
        
        // ユーザ一覧ビューでそれを表示
        return view('gifts.index', [
            'gifts' => $gifts,
        ]);

    }
    
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
            'explain' => $request->explain,
            ]);
            
            return redirect('/');
    }
    
    public function show($id)
    {
        
        $gift = Gift::findOrFail($id);

        return view('gifts.show',[
            'gift' => $gift,
        ]);
    }
    
    public function edit($id)
    {
        $gift =Gift::findOrFail($id);
        
        return view('gifts.edit',compact( 'gift'));
    }
    
    public function update(Request $request,$id)
    {
        
        $gift =Gift::findOrFail($id);
        
        $request->validate([
            'gift' => 'required|max:25',
            'explain' => 'required|max:25',
        ]);
        
        $gift->update([
            'gift' => $request->gift,
            'explain' => $request->explain,
            ]);
            
            return redirect('/');
    }
    
    public function destroy($id)
    {
        $gift = Gift::findOrFail($id);
        
        if(\Auth::id() === $gift->user_id) {
            $gift->delete();
        }
            return redirect('/');
    }
}
