<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * プロフィール登録フォームの表示
     *
     * @return Response
     */
    public function index()
    {
        $is_image = false;
        if (Storage::disk('s3')->exists('profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
            
        $path = Storage::disk('s3')->url('profile_images/' . Auth::id() .'.jpg');
        
            return view('profile/index', ['is_image' => $is_image, 'path' =>$path]);
        }else{
            
        $path = asset('img/user.svg');
           
            return view('profile/index', ['is_image' => $is_image, 'path' =>$path]);
        }
        
    }
    
    /**
     * プロフィールの保存
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function store(ProfileRequest $request)
    {

        $request->photo->storeAs('profile_images', Auth::id() . '.jpg',["disk"=> "s3"]);

        return redirect('profile')->with('success', '新しいプロフィールを登録しました');
    }
}
