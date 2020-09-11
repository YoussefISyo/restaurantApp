@extends('layouts/admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add new Category</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                    @foreach($categories as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->title }}</td>
                        <td> <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-info">Edit</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                        <form action="{{ route('categories.destroy', $c->id) }}" method="post">
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tr>
            </table>
        </div>
    </section>

@endsection

