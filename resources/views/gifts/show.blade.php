@extends('layouts.app')

@section('content')

<div class="container mb-3">
        <div class="row justify-content-center">
        <div class="col-sm row justify-content-center justify-content-sm-end">
                <img class="rounded img-fluid" src="/storage/profile_images/{{ $gift->user->id }}.jpg"width="200px" height="200px" alt="">
        </div>
        <div class="col-sm row justify-content-center justify-content-sm-start">
            <div>
            <div class="user_other font-weight-bold mt-3">{{ $gift->user->name }}</div>
            <div class="overflow-auto mt-1" style="max-height: 200px;">
                @if ($gift->user->gender)
                    <p>性別：{{ $gift->user->gender}}</p>
                    @endif
                    @if ($gift->user->born)
                    <p>誕生日{{ $gift->user->born->format('Y年n月j日')}}</p>
                    @endif
                    
                    <p>自己紹介:{{ $gift->user->myself}}</p>

                    <p>これまでにプレゼントした数{{ $gift->user->gifts->count() }}</p>
                    <p>獲得したいいね数{{ $gift->user->favorites->count()}}</p>
            </div>
            </div>
        </div>
        </div>
</div>
 @if (Auth::id() == $gift->user->id)
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 text-center box_cat_home">
          <h2>プレゼントを変更しますか？</h2>
        <div class="btn col-sm">{!! link_to_route('gifts.edit', '修正する', ['gift' => $gift->id], ['class' => 'btn-full-pop btn-m']) !!}</div>
        <div class="btn col-sm">
        {!! Form::open(['route' => ['gifts.destroy','gift' => $gift->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除する', ['class' => 'btn col-sm btn-full-red btn-m']) !!}
        {!! Form::close() !!}
        </div>
        </div>
      </div>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        @include('commons.gift')
        <div class="col-12 box_comment_home">
            <div class="row">
                    @foreach($comments as $comment)
                    <div class="col-12">
                        <div class="balloon5 my-1">
                        <p>{{$comment->created_at}} 投稿者：{{$comment->name}}</p>
                                <!--<p>{!! Form::open(['route' => ['comments.destroy','comment' => $comment->id,'id' => $gift->id], 'method' => 'delete']) !!}-->
                                <!--    {!! Form::submit('削除する', ['class' => '']) !!}-->
                                <!--{!! Form::close() !!}-->
                                <!--</p>-->
                          <div class="faceicon">
                            <img class="rounded img-fluid" src="/storage/profile_images/{{ $comment->user_id }}.jpg"width="100px" height="100px" alt="">
                          </div>
                          <div class="chatting">
                            <div class="says">
                                <p>{{$comment->comment}}</p>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                
                <div class="col-12">
                    <div class="formarea container justify-content-center">
                    {!! Form::open(['route' => ['comments.store','id' => $gift->id]]) !!}
                        <div class="form-group row  justify-content-center">
                            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control col', 'rows' => '2']) !!}
                        </div>
                        <div class="col text-center">
                            {!! Form::submit('コメント', ['class' => 'btn btn-square-pop btn-m']) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection