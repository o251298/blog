@extends('welcome')

@section('content')
    <div class="container">
        <img src="{{asset('/storage/' . $path)}}" alt="">
    </div>
@endsection


