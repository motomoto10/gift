@if (count($giving_users) > 0)
    
    <section>
        <div class="d-flex justify-content-center align-items-center mb-6">
            <div>
                        <div class="media-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">投稿者</th>
                                        <th scope="col">名前</th>
                                        <th scope="col">関係性</th>
                                        <th scope="col">お祝い</th>
                                        <th scope="col">日程</th>
                                        <th scope="col">プレゼント</th>
                                        <th scope="col">あげた年</th>
                                        <th scope="col">アクション</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($giving_users as $giving_user)
                                        
                                            @foreach ($giving_user->anniversaries as $anniversary)
                                            
                                                    @foreach ($anniversary->presents as $present)
                                                        <tr>
                                                            <th>{!! (e($giving_user->user->name)) !!}</th>
                                                            <td>{!! link_to_route('giving_users.show', '詳細', ['giving_user' => $giving_user->id]) !!}</td>
                                                            <td>{!! (e($giving_user->name)) !!}</td>
                                                            <td>{!! (e($giving_user->relation)) !!}</td>
                                                            <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                            <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                            <td>{!! (e($present->present)) !!}</td>
                                                            <td>{!! (e($present->year)) !!}</td>
                                                            @if (Auth::id() == $giving_user->user_id)
                                                                <td>test2</td>
                                                            @else
                                                                <td>いいね</td>
                                                            @endif
                                                    @endforeach
                                            @endforeach
                                        </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                {{-- ページネーションのリンク --}}
    <div>{{ $giving_users->links() }}</div>
            </div>
        </div>
    </section>

    
    
@endif