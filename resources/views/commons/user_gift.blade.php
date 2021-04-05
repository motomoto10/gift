    <div class="col-12">
            <div class="card shadow p-2 bg-white rounded mb-4">
                <div class="card-header">
                    <a href="/users/{{ $gift->user->id}}">
                        <div class="row">
                            <img class="rounded img-fluid" src="{{asset($user_path)}}"width="40px" height="40px" alt="">
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