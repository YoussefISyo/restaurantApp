@extends('layouts/admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href="{{ route('orders.create') }}" class="btn btn-primary">Add new Order</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Action</th>
                @if(count($orders))
                @foreach($orders as $o)
                    <tr>
                        <td>{{ $o->id }}</td>
                        <td>@if($o->user) {{ $o->user->name }} @endif</td>
                        <td>{{ $o->totalprice }}</td>
                        <td>{{ $o->address }}</td>
                        <td>{{ $o->ordertime }}</td>
                        <td> <a href="{{ route('orders.edit', $o->id) }}" class="btn btn-info">Edit</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                            <form action="{{ route('orders.destroy', $o->id) }}" method="post">
                                @method('DELETE')
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td colspan="3">No Orders Found</td></tr>
                    @endif
                    </tr>
            </table>
            {{ $orders->render() }}
        </div>
    </section>

@endsection

