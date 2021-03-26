<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-sm row justify-content-center justify-content-sm-end">
                <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="200px" height="200px" alt="">
        </div>
        <div class="col-sm row justify-content-center justify-content-sm-start">
            <div>
            
            <div class="user_other font-weight-bold mt-3">{{ $user->name }}</div>
            <div class="overflow-auto mt-1" style="max-height: 200px;">
                @if ($user->gender)
                    <p>性別：{{ $user->gender}}</p>
                    @endif
                    @if ($user->born)
                    <p>誕生日{{ $user->born->format('Y年n月j日')}}</p>
                    @endif
                    
                    <p>自己紹介:{{ $user->myself}}</p>

                    <p>これまでにプレゼントした数{{ $user->gifts->count() }}</p>
                    <p>獲得したいいね数{{ $user->favorites->count()}}</p>
            </div>
        @if (Auth::id() == $user->id)
        <div class="col">
            {!! link_to_route('users.edit', 'プロフィールを変更する', ['user' => $user->id],['class' => 'btn-flat-dashed-border']) !!}
        </div>
        @endif
            </div>
        </div>
        </div>
</div>