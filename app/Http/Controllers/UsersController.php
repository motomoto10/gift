<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

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
        
        
        if (Storage::disk('s3')->exists('profile_images/' . Auth::id() . '.jpg')) {
        $path = Storage::disk('s3')->url('profile_images/' . Auth::id() .'.jpg');
        }else{
        $path = asset('img/user.svg');
        }
        
        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'gifts' => $gifts,
            'likes' => $likes,
            'target'=> $target,
            'path'=> $path
        ]);

    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $gifts = Gift::where('user_id',$id)->orderBy('id', 'desc')->get();
        
        $likes = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);
        
        if (Storage::disk('s3')->exists('profile_images/' . Auth::id() . '.jpg')) {
        $path = Storage::disk('s3')->url('profile_images/' . Auth::id() .'.jpg');
        }else{
        $path = asset('img/user.svg');
        }
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'gifts'=> $gifts,
            'likes' => $likes,
            'path'=> $path

        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        $genders = User::$genders;
        
        if (Storage::disk('s3')->exists('profile_images/' . Auth::id() . '.jpg')) {
        $path = Storage::disk('s3')->url('profile_images/' . Auth::id() .'.jpg');
        }else{
        $path = asset('img/user.svg');
        }
        
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