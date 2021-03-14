@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <p>{{ $gift->user->name }}に聞いてみよう</p>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            
            @else
            @endif
        </div> 
    </div>
    <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <div class="box25">
                        <div class="row no-gutters">
                            <div class="col-sm-4 col-img">
                                <img class="rounded img-fluid" src="/storage/profile_images/{{ $gift->user->id }}.jpg"width="100px" height="100px" alt="">
                            </div>
                            <div class="col-sm-8 ">
                                <div>
                                    <h3>{{ $gift->user->name }}</h3>
                                    @if ($gift->user->gender)
                                    <p>性別：{{ $gift->user->gender}}</p>
                                    @endif
                                    @if ($gift->user->born)
                                    <p>誕生日{{ $gift->user->born->format('Y年n月j日')}}</p>
                                    @endif
                                    <p>自己紹介:{{ $gift->user->myself}}</p>
                                    <p>これまでにプレゼントした数{{ $gift->user->gifts->count() }}</p>
                                    <p>獲得したいいね数{{ $gift->user->favorites->count()}}</p>
                                    {!! link_to_route('users.show', 'ユーザーページ', ['user' => $gift->user->id],['class' => 'btn-square-purple']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-4 mx-3">
            <div class="box-yellow">
                <div class="text-black text-center">
                    <div>
                        <div>{!! ($gift->gift) !!}</div>
                        <div>
                        <p>ーこのプレゼントへの思いー</p>
                        <p>{!! ($gift->explain) !!}</p>
                        <p>いいね数{{ $gift->favorite->count()}}</p>
                        <div class="my-3">
                        <span class="badge badge-pill badge-primary">{!! ($gift->old) !!}</span>
                        <span class="badge badge-pill badge-light">{!! ($gift->gender) !!}</span>
                        <span class="badge badge-pill badge-success">{!! ($gift->relation) !!}</span>
                        <span class="badge badge-pill badge-danger">{!! ($gift->anniversary) !!}</span>
                        <span class="badge badge-pill badge-warning">{!! ($gift->price) !!}</span>
                        <span class="badge badge-pill badge-info">{!! ($gift->day) !!}</span>
                        </div>

                        @include('gift_favorite.favorite_button')
                        @if (Auth::id() == $gift->user_id)
                        <div class="btn col-sm">{!! link_to_route('gifts.edit', 'このプレゼントを修正する', ['gift' => $gift->id], ['class' => 'btn-full-pop']) !!}</div>
                                <div class="btn col-sm">
                                {!! Form::open(['route' => ['gifts.destroy','gift' => $gift->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除する', ['class' => 'btn col-sm btn-full-red']) !!}
                                {!! Form::close() !!}
                                </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="formarea container justify-content-center">
                    {!! Form::open(['route' => ['comments.store','id' => $gift->id]]) !!}
                        <div class="form-group row ">
                            <label for="comment" class="col-sm-3 col-form-label">メッセージ：</label>
                            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control col-sm-9', 'rows' => '1']) !!}
                        </div>
                        <div class="col-9">
                            {!! Form::submit('送る', ['class' => 'btn btn-square-pop']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-6">
                    @foreach($comments as $comment)
                    <div>
                        <div class="balloon5">
                            <p>{{$comment->created_at}}</p>
                          <div class="faceicon">
                            <img class="rounded img-fluid" src="/storage/profile_images/{{ $comment->user_id }}.jpg"width="100px" height="100px" alt="">
                          </div>
                          <div class="chatting">
                            <div class="says">
                                <p>{{$comment->comment}}</p>
                            </div>
                          </div>
                        </div>
                        <p>投稿者：{{$comment->name}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection