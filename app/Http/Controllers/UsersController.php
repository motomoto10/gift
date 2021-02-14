<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Giving_user;
use App\Anniversary;
use App\Present;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(20);
        
        // ユーザの投稿の一覧を作成日時の降順で取得

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
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,

        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        $genders = User::$genders;
        
        return view('users.edit',compact('user','genders'));
        
    }
    
        public function update(Request $request,$id)
    {
        if (\Auth::check()) {
            
            \Auth::user();
                
            $request->validate([
                'name' => 'required|max:255',
            ]);
            
            $user = User::findOrFail($id);
            $user->name  = $request->name;
            $user->gender  = $request->gender;
            $user->born  = $request->born;
            $user->myself  = $request->myself;
            $user->save();
                
            return redirect('/');
        }
        
    }
    


}