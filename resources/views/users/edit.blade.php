@extends('layouts.app')

@section('content')


<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-sm row justify-content-center justify-content-sm-end">
                <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="200px" height="200px" alt="">
        </div>
        <div class="col-sm row justify-content-center justify-content-sm-start">
            <div>
            <div class="user_other font-weight-bold mt-3">{{ $user->name }}</div>
            <div class="overflow-auto mt-1" style="max-height: 200px;">
                @if ($user->gender)
                    <p>性別：{{ $user->gender}}</p>
                    @endif
                    @if ($user->born)
                    <p>誕生日{{ $user->born->format('Y年n月j日')}}</p>
                    @endif
                    
                    <p>自己紹介:{!! nl2br($user->myself) !!}</p>

                    <p>これまでにプレゼントした数{{ $user->gifts->count() }}</p>
                    <p>獲得したいいね数{{ $user->favorites->count()}}</p>
            </div>
            </div>
        </div>
        </div>
    <button class="btn btn-default col-sm">{!! link_to_route('profile.index', '画像を変更する', [], ['class' => 'nav-link']) !!}</button>
</div>

    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <div class="formarea container">
                {!! Form::open(['route' => ['users.update','user' => $user->id],'method'=>'put']) !!}
                    <div class="form-group">
                        <div class="row my-3">
                            <label for="name" class="col-md-3 col-form-label">名前：</label>
                            {!! Form::text('name', old('name',$user->name), ['class' => 'form-control col-md-9', 'rows' => '1']) !!}
                        </div>
                        <div class="row my-3">
                            <label for="day" class="col-md-3 col-form-label">生年月日：</label>
                            {!! Form::date('born', old('born',$user->born), ['class' => 'form-control col-md-9']) !!}
                        </div>
                        <div class="row my-3">
                            {!! Form::label('gender', '性別:', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <select class="form-control" name="gender">
                                <option selected="selected" value="">選択してください</option>
                                @foreach($genders as $key => $value)
                                    <option value="{{ $value }}"}>
                                    {{ $value }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                        <label for="myself" class="col-md-3 col-form-label">自己紹介：</label>
                        {!! Form::textarea('myself', old('myself',$user->myself), ['class' => 'form-control col-md-9', 'rows' => '2']) !!}
                        </div>
                    </div>
                        <div class="col-12">
                        {!! Form::submit('登録', ['class' => 'btn btn-square-red']) !!}
                        </div>
                        <div class="col-12">
                        <div class="btn btn-square-white mt-3 " type="button" onclick="history.back()">戻る</div>
                        </div>
                {!! Form::close() !!}
                </div>
            @else
            
            @endif
        </div>
    </div>
@endsection