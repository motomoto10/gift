@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
    </div>
    <div class="row justify-content-center">
        @foreach($gifts as $gift)
            @include('commons.present')
        @endforeach
    </div>
        
@endsection