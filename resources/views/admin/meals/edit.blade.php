@extends('layouts/admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Meals</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Meals</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('meals.update', $meal->id) }}" enctype="multipart/form-data">
                @method('PUT')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Name</label>
                        <div class="col-md-6"><input type="text" name="name" class="form-control"
                             value="{{ $meal->name }}"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Photo</label>
                        <div class="col-md-9"><input type="file" name="photo"></div>
                        <div class="clearfix"></div>
                        @if($meal->photo)
                            <div class="col-md-3"></div>
                        <div class="col-md-9">
                        <img src="{{ $meal->photo }}" style="width:150px;">
                        </div>
                            <div class="clearfix"></div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Price</label>
                        <div class="col-md-6"><input type="text" name="price" class="form-control"
                             value="{{ $meal->price }}"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Category</label>
                        <div class="col-md-6">
                            <select name="category_id" class="form-control">
                                <option value="">Choose Category</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}"

                                            @if($c->id == $meal->category_id)
                                                selected
                                            @endif
                                    >{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Ingrediants</label>
                        <div class="col-md-6"><input type="text" name="ingrediants" class="form-control"
                            value="{{ $meal->ingrediants }}"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="save">
                </div>
            </form>
        </div>
    </section>

@endsection

