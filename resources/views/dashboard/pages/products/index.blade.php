@extends('dashboard.inc.master')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                        <a href="{{route('products.create')}}" class="btn btn-primary float-right">Add Product</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $Product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('images/' . $Product->image)}}" alt="" style="width: 100px; height: 100px;"></td>
                                    <td>{{$Product->name}}</td>
{{--                                    <td>{{substr($Product->description, 0, 50)}}...</td>--}}
                                    <td>{{$Product->category->name}}</td>
                                    <td>{{$Product->price}}</td>
                                    <td>{{$Product->stock}}</td>
                                    <td>
                                        <a href="{{route('products.show', $Product->id)}}" class="btn btn-info">Show</a>
                                        <a href="{{route('products.edit', $Product->id)}}" class="btn btn-primary">Edit</a>
                                        @if(auth()->user()->is_super_admin)
                                            <form action="{{route('products.destroy', $Product->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$products->links()}}
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
