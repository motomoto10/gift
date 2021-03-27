    <div class="col-12">
            <div class="card shadow p-2 bg-white rounded mb-4">
                <div class="card-header">
                    <a href="/users/{{ $like->user->id}}">
                        <div class="row">
                    <img class="rounded img-fluid" src="/storage/profile_images/{{ $like->user->id }}.jpg"width="40px" height="40px" alt="">
                    <span class="text-dark mx-2 my-auto">{{ $like->user->name }}</span>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <p>贈ったもの</p>
                    <p class="font-weight-bold">{!! ($like->gift) !!}</p>
                    <div>
                    @if($like->day)
                    <p>贈った日</p>
                    <p>{!! ($like->day->format('Y年n月j日')) !!}</p>
                    @endif
                    <p>このプレゼントへの思い</p>
                    <p>{!! nl2br($like->explain) !!}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="my-0">
                    <span class="badge badge-pill badge-secondary">{!! ($like->old) !!}</span>
                    <span class="badge badge-pill badge-primary">{!! ($like->gender) !!}</span>
                    <span class="badge badge-pill badge-success">{!! ($like->relation) !!}</span>
                    <span class="badge badge-pill badge-danger">{!! ($like->anniversary) !!}</span>
                    <span class="badge badge-pill badge-warning">{!! ($like->price) !!}</span>
                </div>
                <div class="row justify-content-centr">
                    <div class="col-md-6 align-items-center">
                        @if (Auth::check())
                        @include('gift_favorite.favorite_button')
                        @endif
                        <div class="text-center">
                        <i class="far fa-heart fa-lg pr-2" style="color: #BBBBBB;"></i>
                        <span class="align-self-end  mx-2">いいね　{{ $like->favorite->count()}}</span>
                        </div>
                    </div>
                    <div class="col-md-6 align-items-center">
                        <button class="btn btn-default col-lg">{!! link_to_route('gifts.show', '詳しく聞いてみる', ['gift' => $like->id], ['class' => 'btn-full-pop btn-hover btn-m']) !!}</button>
                        <div class="text-center">
                        <i class="far fa-comments fa-lg pr-2" style="color: #BBBBBB;"></i>
                        <span class="align-self-end mx-2">
                            コメント　{{ $like->comments->count()}}
                        </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                        <small>{!! ($like->created_at) !!}</small>
                </div>
                </div>
            </div>
</div>