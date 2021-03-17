@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
                <h1>さあ！<br>
                プレゼントを送りましょう</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
            <div class="col-sm my-3">{!! link_to_route('gifts.create', 'プレゼントを登録する', [], ['class' => 'btn-square-pink btn-hover']) !!}</div>

                
            <h2 class="">あなたがいいねしたものはこちらです。</h2>

        <div class="row justify-content-center">
            @foreach ($gifts as $gift)
                @include('commons.present')
            @endforeach
        </div>
    </div>
<div>{{ $gifts->links() }}</div>
</div>
</div>
@endsection