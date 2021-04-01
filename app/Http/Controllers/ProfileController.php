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
        $disk = Storage::disk('s3');
        
        $is_image = false;
        if ($disk->exists('profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('profile/index', ['is_image' => $is_image]);
    }
    
    /**
     * プロフィールの保存
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function store(ProfileRequest $request)
    {
        $disk = Storage::disk('s3');
        
        $request->photo->storeAs($disk->profile_images, Auth::id() . '.jpg');

        return redirect('profile')->with('success', '新しいプロフィールを登録しました');
    }
}
