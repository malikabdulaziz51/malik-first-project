@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-users"></i> Users
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">Users</li>
@endsection

@section('content')

 <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Cari</h3>
                        </div>
                        <div class="x_content">
                            <form class="form-inline" action="{{ route('users.index') }}" method="get">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" value="{{ Request::get('name') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" value="{{ Request::get('email') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('users.index') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>List Users
                           
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$number++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-center">
                                        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <a onclick="return confirm('Delete this data ?')" href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {!! $users->appends(request()->all())->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection