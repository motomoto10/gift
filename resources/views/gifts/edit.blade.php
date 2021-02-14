@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>誰に送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            <div class="formarea container">
                {!! Form::open(['route' => ['gifts.update','gift' => $gift->id],'method'=>'put']) !!}
                    <div class="form-group row">
                        <label for="gift" class="col-sm-3 col-form-label">プレゼント：</label>
                        {!! Form::textarea('gift', old('gift'), ['class' => 'form-control col-sm-9', 'rows' => '1']) !!}
                        <label for="explain" class="col-sm-3 col-form-label">このプレゼントへの思い：</label>
                        {!! Form::textarea('explain', old('explain'), ['class' => 'form-control col-sm-9', 'rows' => '3']) !!}
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