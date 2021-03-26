<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\User;
use App\Gift;

class UsersController extends Controller
{
    public function index()
    {
        $target = Gift::$genders;
        
        $gifts = Gift::orderBy('id', 'desc')->paginate(3);
        
        $likes = Gift::withCount('favorite')->orderBy('favorite_count', 'desc')->paginate(3);
        
        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'gifts' => $gifts,
            'likes' => $likes,
            'target'=> $target
        ]);

    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $gifts = Gift::where('user_id',$id)->orderBy('id', 'desc')->get();
        
        $likes = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'gifts'=> $gifts,
            'likes' => $likes,

        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        
        
        $genders = User::$genders;
        
        return view('users.edit',compact('user','genders'));
        
    }
    
        public function update(UserRequest $request,$id)
    {
        if (\Auth::check()) {
        
            $user = User::findOrFail($id);
        
            $user->fill($request->validated())->save();
            
            
                
            return redirect('/');
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