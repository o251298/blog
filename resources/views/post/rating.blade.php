@extends('welcome')
@section('content')
    <div class="container">
        @foreach($posts_correct as $id => $test)
            <div class="card mb-3">
                <div class="card-body">
                    @foreach($posts as $post)
                        @if($post->id == $id)
                            <a href="{{route('view', [$post->id])}}">
                                {{$post->title}}
                            </a>
                            <br>
                            <i>@lang('nav.rating'): <strong>{{$test}}</strong></i>
                            <br>
                            <i>{{$post->created_at}}</i>
                            <br>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection


