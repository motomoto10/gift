<div class="col-12 my-2 ">
    <div class="box-green">
        <div class="text-black text-center">
            <div>
                <div>
                    <p>ープレゼントー</p>
                    <p class="font-weight-bold">{!! ($like->gift) !!}</p>
                </div>
                <div class="my-3">
                    <span class="badge badge-pill badge-primary">{{ $like->favorite->count()}}いいね</span>
                    <span class="badge badge-pill badge-secondary">{!! ($like->old) !!}</span>
                    <span class="badge badge-pill badge-light">{!! ($like->gender) !!}</span>
                    <span class="badge badge-pill badge-success">{!! ($like->relation) !!}</span>
                    <span class="badge badge-pill badge-danger">{!! ($like->anniversary) !!}</span>
                    <span class="badge badge-pill badge-warning">{!! ($like->price) !!}</span>
                    @if($like->day)
                        <span class="badge badge-pill badge-info">{!! ($like->day->format('Y年n月j日')) !!}</span>
                     @endif
                     </div>
                <div>
                    <p>ーこのプレゼントへの思いー</p>
                    <p>{!! ($like->explain) !!}</p>
                    </div>
                <div>
                    <div class="no-gutters">
                        <div class="col-img">
                            <img class="rounded img-fluid" src="/storage/profile_images/{{ $like->user->id }}.jpg"width="100px" height="100px" alt="">
                        </div>
                        <div class="col">
                            <div>
                                <p>ユーザー名：{{ $like->user->name }}</p>
                            </div>
                        </div>
                    </div>
                
                <div class="row">
                <button class="btn btn-default col-md">{!! link_to_route('gifts.show', '詳しく聞いてみる', ['gift' => $like->id], ['class' => 'btn-full-pop btn-hover btn-m']) !!}</button>
                </div>
                <div>
                @if (Auth::check())
                @include('gift_favorite.favorite_button')
                @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</div>