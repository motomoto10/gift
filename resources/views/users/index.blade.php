@extends('layouts.app')

@section('content')
 <section class="hero_single version_2">
    <div class="wrapper">
      <div class="container">
        <div class="row justify-content-center pt-lg-5 text-left">
          <div class="col-xl-5 col-lg-6">
            <h3>プレゼントに困った方に!<br>みんながあげたプレゼントを<br>あつめました。</h3>
            <p>あなたのあげたい相手にマッチしたプレゼントを発見しよう。</p>
            
            
            <form action="/reviews" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
              <div class="custom-search-input-2">
                <div class="form-group">
                  <input type="text" name="skill_title" id="skill_title" class="form-control" placeholder="何を学びたいですか？" style="width: 100%" />
                  <i class="icon_search"></i>
                </div>
                <!-- please fetch categories from database except 全てのカテゴリー -->
                <select name="category_ids" id="category_ids" class="wide"><option value="">学び方</option><option value="1">オンラインスクール</option>
<option value="2">通学・通い</option>
<option value="3">国内Webサービス</option>
<option value="4">海外Webサービス</option>
<option value="5">教材の質がいい</option>
<option value="6">メンターに自信あり</option>
<option value="7">留学</option>
<option value="8">求職支援プログラム</option></select>

                <input type="submit" name="commit" value="検索する" data-disable-with="検索する" />
              </div>
            </form>
        </div>
        
        
        
          <div class="col-xl-5 col-lg-6 text-right d-none d-lg-block">
            <img class="img-fluid" width="300" height="300" src="{{ asset('img/present.png') }}" />
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <div class="container margin_30 category">
    <div class="main_title_3">
      <h4><strong>人気のカテゴリー</strong></h4>
      <p>最近、見られているカテゴリーです。</p>
      {!! link_to_route('gifts.index', '全て見る', [], ['class' => '']) !!}
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/birthday.svg') }}" />
            <h3>誕生日</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/mother.svg') }}" />
            <h3>母の日</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/father.svg') }}" />
            <h3>父の日</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/lover.svg') }}" />
            <h3>彼女の誕生日</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/baby.svg') }}" />
            <h3>出産祝い</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/santa.svg') }}" />
            <h3>クリスマス</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/jiji.svg') }}" />
            <h3>おじいちゃんの誕生日</h3>
          </a>
        </div>
        <div class="col-lg-3 col-6">
          <a href="/review/online" class="box_cat_home" data-turbolinks="false">
            <img width="80" height="80" src="{{ asset('img/wedding.svg') }}" />
            <h3>結婚祝い</h3>
          </a>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="main_title_3">
          <h4><strong>新着プレゼント</strong></h4>
          <p>最新のプレゼントです。新着順で表示されます。</p>
        </div>
        <div class="row">
        @foreach($gifts as $gift)
            @include('commons.gift')
        @endforeach
        <!-- Pagination -->
        <div class="col-md-9 offset-3">
          
        </div>
    </div>
      </div>

      <div class="col-lg-6">
          <div class="main_title_3">
            <h4><strong>人気トップ３</strong></h4>
            <p>いいねの多いプレゼントはこちら。</p>
          </div>
          <div class="row">
            @foreach($likes as $like)
                @include('commons.like')
            @endforeach
          </div>
      </div>
      
      </div>
    </div>
  </div>
  <!-- /container -->
  <!-- /bg_color_1 -->
  
  
  
   <div class="call_section">
    <div class="container margin_80_55">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6">
          <img class="img-fluid" width="300" height="300"  src="{{ asset('img/present.png') }}" />
        </div>
        <div class="col-xl-5 col-lg-6 pt-lg-5">
          <h3>プレゼントを教えてください</h3>
          <p>あなたのあげたプレゼントを知りたい方もいます。<br>
          大切な方へのプレゼントを登録してみてください。
          </p>
          <p>
            <div class="col-sm my-3">{!! link_to_route('gifts.create', 'プレゼントを登録する', [], ['class' => 'btn-square-pink btn-hover']) !!}</div>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- /container -->
@endsection