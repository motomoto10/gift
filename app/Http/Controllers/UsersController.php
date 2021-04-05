<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Arr;

use App\User;
use App\Gift;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $target = Gift::$target;
        
        $gifts = Gift::orderBy('id', 'desc')->paginate(4);
        
        $likes = Gift::withCount('favorite')->orderBy('favorite_count', 'desc')->paginate(3);
        
        
	    
	    foreach ( $gifts as $key => $value ) {
        $path[$key] = Arr::get($gifts[$key], 'user_id');
           
            if (Storage::disk('s3')->exists('profile_images/' . $path[$key]. '.jpg')) {
            
            $gift_path[$key] = Storage::disk('s3')->url('profile_images/' . $path[$key] .'.jpg');
            
            }else{
            
            $gift_path[$key] = asset('img/user.svg');
            
            }
	        
	   }
	   
	   	foreach ( $likes as $key => $value ) {
        $path[$key] = Arr::get($likes[$key], 'user_id');
           
            if (Storage::disk('s3')->exists('profile_images/' . $path[$key]. '.jpg')) {
            
            $like_path[$key] = Storage::disk('s3')->url('profile_images/' . $path[$key] .'.jpg');
            
            }else{
            
            $like_path[$key] = asset('img/user.svg');
            
            }
	        
	   }
	    
	    
        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'gifts' => $gifts,
            'likes' => $likes,
            'target'=> $target,
            'gift_path'=> $gift_path,
            'like_path'=>$like_path
        ]);

    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $gifts = Gift::where('user_id',$id)->orderBy('id', 'desc')->get();
        
        $likes = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);
        
        $user_path = $user->user_image($id);
        
        $gift_path = $user_path;
        
        // いいねの表示　短くしてモデルに書く
        
        if( $user->favorites->count() != 0){
        
        foreach ( $likes as $key => $value ) {
        $path[$key] = Arr::get($likes[$key], 'user_id');
           
            if (Storage::disk('s3')->exists('profile_images/' . $path[$key]. '.jpg')) {
            
            $like_path[$key] = Storage::disk('s3')->url('profile_images/' . $path[$key] .'.jpg');
            
            }else{
            
            $like_path[$key] = asset('img/user.svg');
            
            }
	        
	   }
        
        return view('users.show', [
            'user' => $user,
            'gifts'=> $gifts,
            'likes' => $likes,
            'user_path'=> $user_path,
            'like_path' => $like_path
        ]);
            
            
        }
        // いいねの表示終了
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'gifts'=> $gifts,
            'likes' => $likes,
            'user_path'=> $user_path,
        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        $genders = User::$genders;
        
        $path = $user->user_image($id);
        
        return view('users.edit',compact('user','genders','path'));
        
    }
    
        public function update(UserRequest $request,$id)
    {
        if (\Auth::check()) {
        
            $user = User::findOrFail($id);
        
            $user->fill($request->validated())->save();
            
            
                
            return redirect()->route('users.show',[$user]);
        }
        
    }
    
        public function favorite_present($id)
    {
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // ユーザのいいねしたプレゼントを取得
        $favorits = $user->favorites()->paginate(10);
        
        // フォロー一覧ビューでそれらを表示
        return view('users.favorites',[
            'user' => $user,
            'gifts' => $favorits,
        ]);
   }


}