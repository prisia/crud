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
                    @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Register Time</th>
                            <th>Action</th>
                        </thead>
                            
                        <tbody>
                            @foreach ($user as $row)
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->gender; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->created_at; ?></td>
                                <td>    
                                    <a class="btn btn-primary" href="<?php echo Route('edit',['parameter'=>$row->id]); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger" href="<?php echo Route('delete',['parameter'=>$row->id]); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info" href="<?php echo route('add'); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
