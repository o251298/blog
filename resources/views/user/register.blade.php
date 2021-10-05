@extends('user.layout')
@section('title', 'Register')
<style>
    input.form-control {
        background-color: #3a3b3c;
        border-color: #3a3b3c;
        border-radius: 15px;
    }
    button.btn.btn-primary{
        background-color: #3a3b3c;
        color: white;
        border-color: #3a3b3c ;
    }
</style>
@section('content')
    <div class="container">
        <div style="height: 100px"></div>
        <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3" style="background: #242526 !important; color: white; border-radius: 10px;">

                        <h3>@lang('user.form.register')</h3>
                        <hr>
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                <div id="emailHelp" class="form-text">@lang('user.form.label_email')</div>
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                   {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">@lang('user.form.username')</label>
                                <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                <div id="emailHelp" class="form-text">@lang('user.form.label_username')</div>
                                @error('username')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">@lang('user.form.password')</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}">
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">@lang('user.form.password_check')</label>
                                <input type="password" class="form-control" name="password_check">
                                @error('password_check')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">@lang('user.form.register')</button>
                            <div id="emailHelp" class="form-text">@lang('user.form.already_register')</div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3" style="background: #242526 !important; color: white; border-radius: 10px;">
                        <div class="card" style="width: 18rem; background: #242526 !important; color: white; border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.form.register')</h5>
                                <p class="card-text">@lang('user.form.info_app')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
