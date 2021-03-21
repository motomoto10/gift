<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use App\Comment;


class GiftsController extends Controller
{
    public function index(Request $request)
    {
        $genders = Gift::$genders;
        $relation = Gift::$relation;
        $anniversaries = Gift::$anniversaries;
        $params = $request->query();
        
        

        $gifts = Gift::serachKeyword($params['keyword'] ?? null)
            ->genderFilter($params['gender'] ?? null)
            ->relationFilter($params['relation'] ?? null)
            ->anniversariesFilter($params['anniversaries'] ?? null)
            ->get();
  
        return view('gifts.index',compact('gifts','params','genders','relation','anniversaries'));

    }
    
    public function create()
    {
    $genders = Gift::$genders;
    $relation = Gift::$relation;
    $old = Gift::$old;
    $anniversaries = Gift::$anniversaries;
    $prices = Gift::$prices;

        return view('gifts.create',compact('genders','relation','old','anniversaries','prices'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'gift' => 'required|max:25',
            'explain' => 'max:255',
            'gender' => 'max:255',
            'relation' => 'max:255',
            'old' => 'max:255',
            'anniversary' => 'max:255',
            'price' => 'max:255',
            'day'=> 'max:255'
        ]);
        
        $request->user()->gifts()->create([
            'gift' => $request->gift,
            'explain' => $request->explain,
            'gender' => $request->gender,
            'relation' => $request->relation,
            'old' => $request->old,
            'anniversary' =>$request->anniversary,
            'price' => $request->price,
            'day' => $request->day,
            ]);
            
            return redirect('/');
    }
    
    public function show($id)
    {
        
        $gift = Gift::findOrFail($id);
        
        $comments = Comment::where('gift_id',$id)->get();

        return view('gifts.show',[
            'gift' => $gift,
            'comments' => $comments
        ]);
    }
    
    public function edit($id)
    {
        $gift =Gift::findOrFail($id);
        
        $genders = Gift::$genders;
        $relation = Gift::$relation;
        $old = Gift::$old;
        $anniversaries = Gift::$anniversaries;
        $prices = Gift::$prices;

        return view('gifts.edit',compact('gift','genders','relation','old','anniversaries','prices'));
        
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
