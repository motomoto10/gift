<div class="col-sm-6 my-2 ">
    <div class="box-yellow">
        <div class="text-black text-center">
            <div>
                <div>
                    <p>ープレゼントー</p>
                    <p class="font-weight-bold">{!! ($gift->gift) !!}</p>
                </div>
                <div class="my-3">
                    <span class="badge badge-pill badge-primary">{{ $gift->favorite->count()}}いいね</span>
                    <span class="badge badge-pill badge-secondary">{!! ($gift->old) !!}</span>
                    <span class="badge badge-pill badge-light">{!! ($gift->gender) !!}</span>
                    <span class="badge badge-pill badge-success">{!! ($gift->relation) !!}</span>
                    <span class="badge badge-pill badge-danger">{!! ($gift->anniversary) !!}</span>
                    <span class="badge badge-pill badge-warning">{!! ($gift->price) !!}</span>
                    @if($gift->day)
                        <span class="badge badge-pill badge-info">{!! ($gift->day->format('Y年n月j日')) !!}</span>
                     @endif
                     </div>
                <div>
                    <p>ーこのプレゼントへの思いー</p>
                    <p>{!! ($gift->explain) !!}</p>
                    </div>
                <div>
                    <div class="no-gutters">
                        <div class="col-img">
                            <img class="rounded img-fluid" src="/storage/profile_images/{{ $gift->user->id }}.jpg"width="100px" height="100px" alt="">
                        </div>
                        <div class="col">
                            <div>
                                <p>ユーザー名：{{ $gift->user->name }}</p>
                                @if ($gift->user->gender)
                                <p>性別：{{ $gift->user->gender}}</p>
                                @endif
                                @if ($gift->user->born)
                                <p>誕生日{{ $gift->user->born->format('Y年n月j日')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <button class="btn btn-default col-md">{!! link_to_route('gifts.show', '詳しく聞いてみる', ['gift' => $gift->id], ['class' => 'btn-full-pop btn-hover btn-m']) !!}</button>
                </div>
                @if (Auth::check())
                @include('gift_favorite.favorite_button')
                @endif
                </div>
            </div>
        
    </div>
</div>