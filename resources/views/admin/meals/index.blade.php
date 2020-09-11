@extends('layouts/admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Meals</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Meals</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('meals.create') }}" class="btn btn-primary">Add new Meal</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Ingrediants</th>
                    <th>Action</th>
                @if(count($meals))
                @foreach($meals as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->name }}</td>
                        <td>{{ $m->price }}</td>
                        <td>@if($m->categories) {{ $m->categories->title }} @endif </td>
                        <td>{{ $m->ingrediants }}</td>
                        <td> <a href="{{ route('meals.edit', $m->id) }}" class="btn btn-info">Edit</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                            <form action="{{ route('meals.destroy', $m->id) }}" method="post">
                                @method('DELETE')
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="3">No Meals Found</td></tr>
                    @endif
                    </tr>
            </table>
            {{ $meals->render() }}
        </div>
    </section>

@endsection

