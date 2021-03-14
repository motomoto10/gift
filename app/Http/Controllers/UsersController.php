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
        $user = User::orderBy('id', 'desc')->paginate(20);
        
        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $user,
        ]);

    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $gifts = Gift::where('user_id',$id)->get();
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'gifts' => $gifts,

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