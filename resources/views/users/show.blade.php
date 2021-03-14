@extends('layouts.app')

@section('content')
    <div class="row">
        {{$user->id}}
        @include('users.card')
            <div class="row justify-content-center">
            @foreach($gifts as $gift)
                @include('users.present')
            @endforeach
            </div>
        </div>
    </div>
@endsection