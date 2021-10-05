@extends('user.layout')
@section('title', 'Login')
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
            @error('reset_password_success')
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3" style="background: #242526 !important; color: white; border-radius: 10px;">
                        <h3>@lang('user.form.login')</h3>
                        <hr>
                        @error('username')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <form action="{{route('login')}}" method="post" style="background: #242526;">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">@lang('user.form.username')</label>
                                <input type="text" class="form-control" name="username">
                                <div id="emailHelp" class="form-text">@lang('user.form.label_username')</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">@lang('user.form.password')</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">@lang('user.form.login')</button>

                            <div id="emailHelp" class="form-text">@lang('user.form.not_register')</div>
                            <div id="emailHelp" class="form-text">@lang('user.form.reset_password')</div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3" style="background: #242526 !important; color: white; border-radius: 10px;">
                        <div class="card" style="width: 18rem; background: #242526 !important; color: white; border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.form.login')</h5>
                                <p class="card-text">@lang('user.form.info_app')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
