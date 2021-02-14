@extends('layouts.app')

@section('content')
        @foreach($gifts as $gift)
            @include('users.present')
        @endforeach
    
@endsection