@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-user"></i> User
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li><a href="{{ route('users.index') }}">Users</a></li>
<li class="active">Edit Data</li>
@endsection

@section('content')
 <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="box box-primary">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                        <form action="{{ route('users.update', ['id' => $user['user']->id]) }}" method="post">
                        {!! csrf_field() !!}
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif       
                            <input type="hidden" name="_method" value="PUT">                
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Name</label>
                                <div class='col-md-7'>
                                <input type='text' class='form-control' name='name' placeholder="Name" required value="{{ $user['user']->name }}">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Email</label>
                                <div class='col-md-7'>
                                <input type='text' class='form-control' name='email' placeholder="Email" required value="{{ $user['user']->email }}">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Password</label>
                                <div class='col-md-7'>
                                <input type='password' class='form-control' name='password' placeholder="Password" required value="{{ $user['user']->password }}">
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Password Confirmation</label>
                                <div class='col-md-7'>
                                    <input type='password' class='form-control' name='password_confirmation' placeholder="Password Confirmation" required value="{{ old('password_confirmation') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
