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
                    <h4>Now Editing Data : </h4>
                    <form action="<?php echo Route('update',['parameter'=>$user->id]); ?>" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" class="form-control" name="name" placeholder="<?php echo $user->name; ?>">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Gender :</label>
                            <select name="gender" class="form-control">
                                <option value="male" <?php echo ($user->gender=="male")? "selected":""; ?>>Male</option>
                                <option value="female"<?php echo ($user->gender=="female")? "selected":""; ?>>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" class="form-control" name="email" placeholder="<?php echo $user->email; ?>">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
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
