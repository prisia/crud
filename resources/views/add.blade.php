@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="crud">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h4>Now Adding a Data : </h4>
                    <form action="<?php echo Route('store'); ?>" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" class="form-control" name="name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Gender :</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" class="form-control" name="email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Confirm Password :</label>
                            <input type="password" class="form-control" name="confirm_password">
                            @if ($errors->has('confirm_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="submit" name="" class="btn btn-success">
                        <a class="btn btn-info" href="<?php echo url('/home') ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
