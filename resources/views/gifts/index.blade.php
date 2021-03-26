@extends('layouts.app')

@section('content')
      <main>
  <div id="results">
    <div class="container">
      <input type="hidden" id="category-id" value="">
      <input type="hidden" id="skill-id" value="">
      <div class="row justify-content-between">
        <div class="col-lg-3 col-md-4 col-10">
          <!-- categories and results for searching -->
          <h1><strong id='results-count'>{{ $gifts->count()}}</strong>件の検索結果</h1>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /results -->
  <div class="container margin_15_35">
    <div class="row">
        <aside class="col-lg-3" id="sidebar">
            <div id="filters_col">
            <a data-toggle="collapse" class="text-dark" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters"id="filters_col_bt">
            検索フィルタ</a>
                <div class="collapse show" id="collapseFilters">
            @include('commons.search')
        <!--/collapse -->
            </div>
            </div>
        <!--/filters col-->
        </aside>
      <!-- /aside -->

    <div class="col-lg-9">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($gifts as $gift)
                    @include('commons.gift')
            @endforeach
            </div>
        </div>
    </div>
@endsection