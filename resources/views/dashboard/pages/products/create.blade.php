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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{--                    @if ($errors->any())--}}
                    {{--                        <div class="alert alert-danger">--}}
                    {{--                            <ul>--}}
                    {{--                                @foreach ($errors->all() as $error)--}}
                    {{--                                    <li>{{ $error }}</li>--}}
                    {{--                                @endforeach--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                       placeholder="Enter Product Name">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="Description">Product Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter Product Description">{{old('description')}}</textarea>
                                @error('description') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}"
                                       placeholder="Enter Product Price">
                                @error('price') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock">Product Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock')}}"
                                       placeholder="Enter Product Stock">
                                @error('stock') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
