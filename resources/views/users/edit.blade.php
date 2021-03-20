@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>あなたの変更です</h1>
                
                <img class="w-25" src="{{ asset('img/present.png') }}">
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