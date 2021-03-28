<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use App\Comment;
use App\Http\Requests\GiftRequest;


class GiftsController extends Controller
{
    public function index(Request $request)
    {
        $genders = Gift::$genders;
        $relation = Gift::$relation;
        $anniversaries = Gift::$anniversaries;
        $prices = Gift::$prices;
        $params = $request->query();
        
        $gifts = Gift::searchKeyword($params['keyword'] ?? null)
            ->genderFilter($params['gender'] ?? null)
            ->relationFilter($params['relation'] ?? null)
            ->anniversariesFilter($params['anniversaries'] ?? null)
            ->pricesFilter($params['prices'] ?? null)
            ->get();
        
        return view('gifts.index',compact('gifts','params','genders','relation','anniversaries','prices'));

    }
    
    public function indexsearch(Request $request)
    {
        $target = Gift::$target;
        $genders = Gift::$genders;
        $relation = Gift::$relation;
        $anniversaries = Gift::$anniversaries;
        $prices = Gift::$prices;
        $params = $request->query();
        
        $gifts = Gift::searchKeyword($params['keyword'] ?? null)
            ->targetFilter($params['target'] ?? null)
            ->get();
            
        return view('gifts.index',compact('gifts','params','genders','relation','anniversaries','prices','target'));

    }
    
    
    public function indexsort(Request $request)
    {
        $genders = Gift::$genders;
        $relation = Gift::$relation;
        $anniversaries = Gift::$anniversaries;
        $prices = Gift::$prices;
        
        
            
        return view('gifts.index',compact('gifts','params','genders','relation','anniversaries','prices'));

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
    
    public function store(GiftRequest $request)
    {
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
    
    public function update(GiftRequest $request,$id)
    {
        
        $gift =Gift::findOrFail($id);
        
        
        $gift->update([
            'gift' => $request->gift,
            'explain' => $request->explain,
            'gender' => $request->gender,
            'relation' => $request->relation,
            'old' => $request->old,
            'anniversary' =>$request->anniversary,
            'price' => $request->price,
            'day' => $request->day,
            ]);
            
            return redirect()->route('gifts.show',[$gift]);
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
