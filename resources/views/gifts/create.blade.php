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
                        <label for="gift" class="col-md-3 col-form-label">プレゼント*：</label>
                        {!! Form::textarea('gift', old('gift'), ['class' => 'form-control col-md-9', 'rows' => '1']) !!}
                        </div>
                        <div class="row my-3">
                        <label for="day" class="col-md-3 col-form-label">贈った日：</label>
                        {!! Form::date('day', old('day'), ['class' => 'form-control col-md-9', 'rows' => '1']) !!}
                        </div>
                        <div class="row my-3">
                        {!! Form::label('relation', '相手との関係:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <select class="form-control" name="relation">
                            <option selected="selected" value="">選択してください</option>
                            @foreach($relation as $key => $value)
                                <option value="{{ $value }}"}>
                                {{ $value }}
                                </option>
                            @endforeach
                            </select>
                        </div>
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
                        <div class="row  my-3">
                        {!! Form::label('anniversary', 'お祝い:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <select class="form-control" name="anniversary">
                            <option selected="selected" value="">選択してください</option>
                            @foreach($anniversaries as $key => $value)
                                <option value="{{ $value }}"}>
                                {{ $value }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row my-3">
                        {!! Form::label('old', '年齢:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <select class="form-control" name="old">
                            <option selected="selected" value="">選択してください</option>
                            @foreach($old as $key => $value)
                                <option value="{{ $value }}"}>
                                {{ $value }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row my-3">
                        {!! Form::label('price', '価格:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <select class="form-control" name="price">
                            <option selected="selected" value="">選択してください</option>
                            @foreach($prices as $key => $value)
                                <option value="{{ $value }}"}>
                                {{ $value }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row my-3">
                        <label for="explain" class="col-md-3 col-form-label">このプレゼントへの思い：</label>
                        {!! Form::textarea('explain', old('explain'), ['class' => 'form-control col-md-9', 'rows' => '3']) !!}
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