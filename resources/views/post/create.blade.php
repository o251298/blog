@extends('welcome')
<style>
    input.form-control {
        background-color: #3a3b3c;
        border-color: #3a3b3c;
        border-radius: 15px;
    }
    button.btn.btn-light{
        background-color: #3a3b3c;
        color: white;
        border-color: #3a3b3c ;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{$error}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <form action="{{route('store_post_form')}}" method="post" enctype="multipart/form-data" style="background: #242526; padding: 20px; color: #d6d8d9">
                    @csrf
                    <input type="hidden" name="user_id" value="2">
                    <div class="mb-3">
                        <label for="title" class="form-label">@lang('post.view.new_title'):</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">@lang('post.view.new_text'):</label>
                        <input type="text" name="text" value="{{old('text')}}" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-light">@lang('nav.other.send')</button>
                </form>
            </div>
        </div>

    </div>
@endsection


