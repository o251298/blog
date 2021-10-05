@extends('user.layout')
@section('title', 'Reset password')
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
    <div style="height: 50px"></div>
    <div class="container">
        <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3" style="background: #242526 !important; color: white; border-radius: 10px;">
                    <h3>@lang('user.form.reset_password_info')</h3>
                    <form action="{{route('new_password')}}" method="post">
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
                        <button type="submit" class="btn btn-primary">@lang('user.form.register')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


