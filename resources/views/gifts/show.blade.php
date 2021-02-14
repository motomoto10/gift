@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>詳細です</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            
            @else
            @endif
            <div class="col-sm-3 m-2 ">
                <div class="box-yellow">
                    <div class="text-black text-center">
                        <div>
                            <div>{!! ($gift->gift) !!}</div>
                            <div>
                                <p>ーこのプレゼントへの思いー</p>
                                <p>{!! ($gift->explain) !!}</p>
                                <button class="btn col-sm">{!! link_to_route('gifts.edit', 'このギフトを修正する', ['gift' => $gift->id], ['class' => 'btn-full-pop']) !!}</button>
                                <button class="btn col-sm">
                                {!! Form::open(['route' => ['gifts.destroy','gift' => $gift->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除する', ['class' => 'btn col-sm btn-full-red']) !!}
                                {!! Form::close() !!}
                                </button>
                                @include('gift_favorite.favorite_button')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection