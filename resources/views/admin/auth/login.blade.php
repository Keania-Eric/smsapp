@extends('admin.auth.layout')
@section('page')
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="{{asset('assets/images/logo.png')}}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif 
                <form action="{{route('admin.login')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group mb-lg">
                        <label>Email Address</label>
                        <div class="input-group input-group-icon">
                            <input name="email" type="text" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email')}}" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                    
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <!-- <input id="RememberMe" name="rememberme" type="checkbox"/>
                                <label for="RememberMe">Remember Me</label> -->
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
    </div>
</section>
<!-- end: page -->
@endsection