@extends('layouts.app')

@section('content')

@include('users.card')
 @if (Auth::id() == $user->id)
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 text-center box_cat_home">
          <h2>プレゼントを教えてください</h2>
          <p>あなたのあげたプレゼントを知りたい方もいます。<br>
          大切な方へのプレゼントを登録してみてください。
          </p>
          <p>
            <div class="col-sm my-3">{!! link_to_route('gifts.create', 'プレゼントを登録する', [], ['class' => 'btn-square-pink btn-hover']) !!}</div>
          </p>
        </div>
      </div>
    </div>
@endif
<div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="main_title_3">
          <h4><strong>{{ $user->name }}のプレゼント</strong></h4>
          <p>最近登録したプレゼントはこちら</p>
        </div>
        <div class="row">
        @foreach($gifts as $gift)
             <div class="col-12">
            <div class="card shadow p-2 bg-white rounded mb-4">
                <div class="card-header">
                    <a href="/users/{{ $gift->user->id}}">
                        <div class="row">
                            <img class="rounded img-fluid" src="{{$user_path}}"width="40px" height="40px" alt="">
                    <span class="text-dark mx-2 my-auto">{{ $gift->user->name }}</span>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                      <div class="card-content">
                        <p class="card-title font-weight-bold">{!! ($gift->gift) !!}</p>
                        
                        @if($gift->day)
                        <p class="card-text"><i class="far fa-calendar-alt mr-2"></i>{!! ($gift->day->format('Y年n月j日')) !!}</p>
                        @endif
                        @if($gift->day)
                        <p class="card-text">
                        <i class="far fa-comment mr-2"></i>{!! nl2br($gift->explain) !!}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="my-0">
                    <span class="badge badge-pill badge-secondary">{!! ($gift->old) !!}</span>
                    <span class="badge badge-pill badge-primary">{!! ($gift->gender) !!}</span>
                    <span class="badge badge-pill badge-success">{!! ($gift->relation) !!}</span>
                    <span class="badge badge-pill badge-danger">{!! ($gift->anniversary) !!}</span>
                    <span class="badge badge-pill badge-warning">{!! ($gift->price) !!}</span>
                </div>
                <div class="row justify-content-centr">
                    <div class="col-md-6 align-items-center">
                        @if (Auth::check())
                        @include('gift_favorite.favorite_button')
                        @endif
                        <div class="text-center">
                        <i class="far fa-heart fa-lg pr-2" style="color: #BBBBBB;"></i>
                        <span class="align-self-end  mx-2">いいね　{{ $gift->favorite->count()}}</span>
                        </div>
                    </div>
                    <div class="col-md-6 align-items-center">
                        @if (Auth::check())
                        <button class="btn btn-default col-lg">{!! link_to_route('gifts.show', '詳しく聞いてみる', ['gift' => $gift->id], ['class' => 'btn-full-pop btn-hover btn-m']) !!}</button>
                        @endif
                        <div class="text-center">
                        <i class="far fa-comments fa-lg pr-2" style="color: #BBBBBB;"></i>
                        <span class="align-self-end mx-2">
                            コメント　{{ $gift->comments->count()}}
                        </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                        <small>{!! ($gift->created_at) !!}</small>
                </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Pagination -->
        <div class="col-md-9 offset-3">
          
        </div>
    </div>
      </div>

      <div class="col-lg-6">
          <div class="main_title_3">
            <h4><strong>{{ $user->name }}のいいね</strong></h4>
            <p>最近いいねしたプレゼントはこちら。</p>
          </div>
          <div class="row">
            @foreach($likes as $like)
                @include('commons.like')
            @endforeach
          </div>
      </div>
      
      </div>
    </div>
@endsection