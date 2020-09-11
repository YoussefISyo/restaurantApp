@extends('layouts/admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add new User</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                @if(count($users))
                @foreach($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td> <a href="{{ route('users.edit', $u->id) }}" class="btn btn-info">Edit</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                            <form action="{{ route('users.destroy', $u->id) }}" method="post">
                                @method('DELETE')
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td colspan="3">No Users Found</td></tr>
                    @endif
                    </tr>
            </table>
            {{ $users->render() }}
        </div>
    </section>

@endsection

