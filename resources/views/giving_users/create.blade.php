@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>誰に送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => 'giving_users.store']) !!}
                    <div class="form-group">
        名前：{!! Form::textarea('name', old('name'), ['class' => 'form-control', 'rows' => '1']) !!}
        {!! Form::label('gender', '関係性:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            @foreach($relation as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('relation', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        {!! Form::label('gender', '性別:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            @foreach($genders as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('gender', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        {!! Form::label('old', '年齢:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            @foreach($old as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('old', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            @endif
            
        </div>
    </div>
@endsection