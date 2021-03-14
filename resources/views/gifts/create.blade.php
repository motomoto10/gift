@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>誰に送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            <div class="formarea container">
                {!! Form::open(['route' => 'gifts.store']) !!}
                    <div class="form-group">
                        <div class="row my-3">
                        <label for="gift" class="col-sm-3 col-form-label">プレゼント*：</label>
                        {!! Form::textarea('gift', old('gift'), ['class' => 'form-control col-sm-9', 'rows' => '1']) !!}
                        </div>
                        <div class="row my-3">
                        <label for="day" class="col-sm-3 col-form-label">贈った日：</label>
                        {!! Form::date('day', old('day'), ['class' => 'form-control col-sm-9', 'rows' => '1']) !!}
                        </div>
                        <div class="row my-3">
                        {!! Form::label('relation', '相手との関係:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            @foreach($relation as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('relation', $value,true,) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        </div>
                        <div class="row my-3">
                        {!! Form::label('gender', '性別:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            @foreach($genders as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('gender', $value,true,) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        </div>
                        <div class="row  my-3">
                        {!! Form::label('anniversary', 'お祝い:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            @foreach($anniversaries as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('anniversary', $value,true,) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        </div>
                        <div class="row my-3">
                        {!! Form::label('old', '年齢:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            @foreach($old as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('old', $value,true,) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        </div>
                        <div class="row my-3">
                        {!! Form::label('price', '価格:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            @foreach($prices as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('price', $value,true,) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        </div>
                        <div class="row my-3">
                        <label for="explain" class="col-sm-3 col-form-label">このプレゼントへの思い：</label>
                        {!! Form::textarea('explain', old('explain'), ['class' => 'form-control col-sm-9', 'rows' => '3']) !!}
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