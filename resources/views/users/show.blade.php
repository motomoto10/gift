@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @foreach($gifts as $gift)
        @include('users.present')
        @endforeach
        </div>
    </div>
@endsection