<div class="row">
    <div class="col-md btn">
    @if (Auth::user()->is_favorites($like->id))
        {{-- 取り消しボタンのフォーム --}}
        {!! Form::open(['route' => ['gifts.unfavorite', $like->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいねを取り消す', ['class' => "btn btn-green-good btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['gifts.favorite', $like->id]]) !!}
            {!! Form::submit('いいね！', ['class' => "btn btn-white-good btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
    </div>
</div>