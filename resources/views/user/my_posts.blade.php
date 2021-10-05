@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6" >
            <div class="card mb-3" style="max-width: 540px;background: #242526 !important; color: white; border-radius: 10px;">
                <div class="row no-gutters" >
                    <div class="col-md-2">
                        <img src="..." alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{\Illuminate\Support\Facades\Auth::user()->username}}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            @foreach($posts as $post)
                <div class="card mb-3" style="max-width: 540px;background: #242526 !important; color: white; border-radius: 10px;">
                    <img src="{{asset('/storage/' . $post->photo->url)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('view', $post->id)}}">
                                {{$post->title}}
                            </a>
                        </h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection


