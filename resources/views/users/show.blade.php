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
            @include('commons.gift')
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