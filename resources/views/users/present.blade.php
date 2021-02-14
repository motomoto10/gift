<div class="col-sm-3 m-2 ">
    <div class="box-yellow">
        <div class="text-black text-center">
            <div>
                <div>{!! ($gift->gift) !!}</div>
                <div>
                <p>ーこのプレゼントへの思いー</p>
                <p>{!! ($gift->explain) !!}</p>
                <button class="btn btn-default col-sm">{!! link_to_route('gifts.show', 'プレゼントの詳細', ['gift' => $gift->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                </div>
            </div>
        </div>
    </div>
</div>