<div class="col-sm-12 mx-auto mb-3">
    <div class="box25 mx-auto box_card">
        <div class="row no-gutters">
            <div class="col-sm-3 col-img">
                <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="150px" height="150px" alt="">
                @if (Auth::id() == $user->id)
                <button class="btn btn-default col-sm">{!! link_to_route('profile.index', '画像を変更する', [],['class' => 'btn-flat-dashed-border']) !!}</button>
                @endif
            </div>
            <div class="col-sm-9">
                <div class="text-center text-sm-left">
                    <p class="font-weight-bold">{{ $user->name }}<p>
                    @if (Auth::id() == $user->id)
                        {!! link_to_route('users.edit', 'プロフィールを変更する', ['user' => $user->id],['class' => 'btn-flat-dashed-border']) !!}
                    @endif
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
            </div>
        </div>
    </div>
</div>