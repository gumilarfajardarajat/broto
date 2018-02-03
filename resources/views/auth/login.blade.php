@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="">
            <a href="{{ url('/') }}"><img src="/img/logo.png" style="height:260px; margin-bottom: 20px; margin-left:38%; margin-top: 20px;">
            </a>
        </div>           
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="background-color: #DEDED6;">
                <div class="panel-heading" style="text-align: center; background-color: #DEDED6;">
                    <span style="font-weight: bold; font-size: 20px; color:#636B6F;">User Login</span>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            

                            <div class="col-md-8 col-md-offset-2">
                                <input id="username" type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-8 col-md-offset-2">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary col-md-12" style="background-color: #935D2E; border-style: none;">
                                    Masuk
                                </button>                             

<!--                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <a href="{{ url('/') }}" class="btn btn-primary col-md-12" style=" border-style: none;">
                                    Kembali
                                </a>                                
                            </div>
                        </div>     

<!--                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <a href="" class="btn btn-primary col-md-12">
                                    Masuk
                                </a>                                
                            </div>
                        </div>    -->                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
