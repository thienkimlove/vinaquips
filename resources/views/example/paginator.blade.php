@extends('layouts.app')

@section('content')
    <h1>
        Example View Composer
    </h1>
    @foreach ($posts as $post)
        <p>
            {{$post->title}}
        </p>
    @endforeach
    {!! $posts->links() !!}

    @if ($site_settings)
        @foreach ($site_settings as $key => $value)
            Seting key : {{$key}} --- Setting value : {{$value}}
        @endforeach
    @endif
@endsection