<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use App\User;
use App\Comment;
use App\Http\Requests\GiftRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


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
            
        if($gifts->count()!=0){
           
        foreach ( $gifts as $key => $value ) {
            
            $path[$key] = Arr::get($gifts[$key], 'user_id');
           
            if (Storage::disk('s3')->exists('profile_images/' . $path[$key]. '.jpg')) {
            
            $gift_path[$key] = Storage::disk('s3')->url('profile_images/' . $path[$key] .'.jpg');
            
            }else{
            
            $gift_path[$key] = asset('img/user.svg');
            
            } 
        }
        
        return view('gifts.index',compact('gifts','params','genders','relation','anniversaries','prices','gift_path'));
        
        }
        
        
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
        
        $user = User::findOrFail($gift->user_id);
        
        $comments = Comment::where('gift_id',$id)->get();
        
        $user_path = $user->user_image($user->id);
        
        $gift_path = $user_path;
        
        if($comments->count()!=0){
           
        foreach ( $comments as $key => $value ) {
            
            $path[$key] = Arr::get($comments[$key], 'user_id');
        
            if (Storage::disk('s3')->exists('profile_images/' . $path[$key]. '.jpg')) {
            
            $comment_path[$key] = Storage::disk('s3')->url('profile_images/' . $path[$key] .'.jpg');
            
            }else{
            
            $comment_path[$key] = asset('img/user.svg');
            
            }
        }
        
         return view('gifts.show',compact('gift','comments','user_path','gift_path','comment_path'));
                    
                }

        return view('gifts.show',compact('gift','comments','user_path','gift_path'));
        
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
