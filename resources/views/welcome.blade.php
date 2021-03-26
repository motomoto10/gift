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
            <img class="img-fluid" src="{{ asset('img/present.png') }}" />
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <div class="container margin_30">
    <div class="main_title_3">
      <h4><strong>人気のカテゴリー</strong></h4>
      <p>最近、見られているカテゴリーです。</p>
      <a href="/reviews" data-turbolinks="false">全て見る</a>
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
  <div class="container ">
    <div class="row">
      <div class="col-lg-8">
        <div class="main_title_3">
          <h4><strong>新着プレゼント</strong></h4>
          <p>最新のプレゼントです。新着順で表示されます。</p>
        </div>
          <div class="review_card">
            <div class="main_title_1">
              <a href="/services/11" style="text-decoration: none"><h3 class="font-weight-bold mb-3">ヒューマンアカデミー</h3></a>
              <!-- show tags from DB -->
              <div class="postmeta">
                <ul>
                    <li><a href="/reviews?category_ids=1">オンラインスクール</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2 user_info">
                <figure><img src="/assets/avatar1-d344832896954df2ba7e5cced7081ae262337d72d9685ef8ed0475f4df25f899.jpg" /></figure>
                <h5>
<!--                  ステータス1の認証済みユーザーのみ認証マークを表示-->
               </h5>
              </div>
              <div class="col-md-10 review_content">
                <div class="clearfix add_bottom_15">
                  <span class="rating">
                      <i class="icon_star"></i>
                      <i class="icon_star"></i>
                      <i class="icon_star"></i>
                      <i class="icon_star"></i>
                      <i class="icon_star-half"></i>
                    <em>4.2/5.00</em>
                  </span>
                  <em>7日前の投稿 </em>
                </div>
                <h4>とても良かったと感じています。</h4>
                <p>費用が他のプログラミングスクールに比べても比較的に安かったのがとても好印象をもちました。講師の質や使用している教材もとてもわかりやすくて、プログラミングに関しての知識があまりないわたしでも利用しやすかったです。</p>
                <ul class="clearfix">

                  <a class="btn_1 small d-inline-flex float-right" href="/services/11/reviews/8">レビューを読む</a>
                </ul>
              </div>
            </div>
          </div>
        <!-- Pagination -->
        <div class="col-md-9 offset-3">
          
        </div>
      </div>

      <aside class="col-lg-4">

        <div class="container mt-4">
          <div class="main_title_3 mt-5">
            <h4><strong>人気トップ３</strong></h4>
            <p>最近盛り上がっているスクールはこちら。</p>
          </div>

            <div class="container bg-white text-dark p-3 mt-4">
              <div class="main_title_1">
                <a href="/services/5"><h5 class="font-weight-bold">No.1 Udemy</h5></a>
                <span class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half"></i>
                      <i class="icon_star empty"></i>
                  <em>3.8/5.00</em>
                </span>
                <!-- show tags from DB -->
                <div class="postmeta">
                  <ul>
                      <li><a href="/reviews?category_ids=4">海外Webサービス</a></li>
                      <li><a href="/reviews?category_ids=5">教材の質がいい</a></li>
                  </ul>
                </div>
              </div>
              <div class="media">
                <div class="media-body">
                  <p class="mt-0 mb-0">Udemyは言わずと知れた有名な授業販売プラットフォーム。その数なんと約130,000講座。毎月新たな講座が追加されています。見やすいUI、人気講師よる洗練された授業と、買い切り方式の授業のため、本当に自分のペースでの学習が可能な点数が最大の持ち味です。 </p>
                  <a class="btn_1 small float-right mr-4" href="/services/5">スクール詳細</a>
                </div>
              </div>
            </div>
        </div>
      </aside>
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
            <a class="btn_1 add_top_10 wow bounceIn d-inline-flex float-right" href="/for-education">詳細はこちら</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- /container -->

    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>さあ！<br>
                プレゼントを送りましょう</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <!--プレゼントもらう人の登録フォームへ-->
                <div class="col-sm my-3">{!! link_to_route('gifts.create', 'プレゼントを登録する', [], ['class' => 'btn-square-pink btn-hover']) !!}</div>
                <div class="col-sm my-3">{!! link_to_route('users.show', '自分が登録したプレゼント', ['user' => Auth::id()], ['class' => 'btn-square-pop btn-hover']) !!}</div>
                <div class="col-sm my-3">{!! link_to_route('gifts.index', 'みんなが贈ったプレゼント', [], ['class' => 'btn-square-green btn-hover']) !!}</div>
                <div class="col-sm my-3">{!! link_to_route('users.favorite_present', 'いいねしたプレゼント', ['id' => Auth::id()], ['class' => 'btn-square-purple btn-hover']) !!}</div>
            @else
            <div class="text-center">
                <h1>ようこそ！<br>
                Presentへ！！</h1>
            </div>    
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <h2 class="mb-4">あなたの大切な人へプレゼントを送りましょう</h2>
                <div class="container my-3 justify-content-center">
                    <div class="box25 col-md-6 mx-auto">
                            <h2 class="mb-4">Presentとは？？</h2>
                            <p>
                                恋人や家族の誕生日、結婚記念日など、<br>
                                人にプレゼントを贈る機会を登録してみてください。<br>
                                大切な人へプレゼントを送る日を忘れずに管理する機能と、<br>
                                他の人がどんなプレゼントを送っているかを見る事ができます。
                            </p>
                    </div>
                </div>
                    <div class='btn_wrapper mb-3'>
                        {{-- ユーザ登録ページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('signup.get', '新規登録はこちらから！', [], ['class' => 'btn-square-pink']) !!}</button>
                        {{-- ログインページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('login', 'ログインはこちらから！', [], ['class' => 'btn-square-green']) !!}</button>
                        <!--ゲストログイン機能のリンク-->
                        <button class="btn btn-default col-sm">{!! link_to_route('login.guest', 'ゲストログインはこちらから！', [], ['class' => 'btn-square-pop']) !!}</button>
                    </div>
            @endif
        </div>
    </div>
@endsection