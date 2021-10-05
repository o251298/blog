@extends('welcome')
@section('content')
    <div class="container">
        <div class="card mb-3">
                <img src="{{asset('/storage/' . $photo->url)}}" class="card-img-top" alt="..." style="max-height: 500px">
            <div class="card-body">
                <form action="{{route('mark')}}" method="post">
                    @csrf
                    <input type="hidden"name="mark" value="1">
                    <input type="hidden"name="photo_id" value="{{$photo->id}}">
                    <button class="btn btn-danger">Un</button>
                </form>
                <form action="{{route('mark')}}" method="post">
                    @csrf
                    <input type="hidden"name="mark" value="0">
                    <input type="hidden"name="photo_id" value="{{$photo->id}}">
                    <button class="btn btn-light">Like</button>
                </form>
            </div>
        </div>
    </div>
@endsection


