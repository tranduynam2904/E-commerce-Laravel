@extends('admin.layout.master')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- table primary start -->
            <div class="col-lg-12 mt-5">
                <div style="display: flex;justify-content:end"><a href="{{ route('admin.product.create') }}"
                        style="color:white" class="btn btn-primary">Create New Product</a></div>
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="search-box pull-left">
                        <form method="get">
                            <input class="form-control" type="text" name="keyword" placeholder="Search..." required>
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Thead Primary</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Image</th>
<<<<<<< HEAD
                                            <th scope="col">Second Image</th>
=======
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
                                            <th scope="col">Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Discount price</th>
                                            <th scope="col">weight</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Short description</th>
                                            <th scope="col">Product category</th>
                                            <th scope="col">Created_at</th>
                                            <th scope="col">Updated_at</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($products as $product)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $imageLink = is_null($product->image) || !file_exists('images/' . $product->image) ? 'https://liftlearning.com/wp-content/uploads/2020/09/default-image.png' : asset('images/' . $product->image);
                                                    @endphp
                                                    <img width="50px" height="50px" src="{{ $imageLink }}"
                                                        alt="{{ $product->image }}">
                                                </td>
<<<<<<< HEAD
                                                <td>
                                                    @php
                                                        $secondImageLink = is_null($product->second_image) || !file_exists('images/' . $product->second_image) ? 'https://liftlearning.com/wp-content/uploads/2020/09/default-image.png' : asset('images/' . $product->second_image);
                                                    @endphp
                                                    <img width="50px" height="50px" src="{{ $secondImageLink }}"
                                                        alt="{{ $product->second_image }}">
                                                </td>
=======
>>>>>>> 9a4d2e1466d1bbbff54fc706ab064f547d02ec43
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->slug }}</td>
                                                <td>{{ $product->status ? 'Show' : 'Hide' }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discount_price }}</td>
                                                <td>{{ $product->weight }}</td>
                                                <td>{!! $product->description !!}</td>
                                                <td>{!! $product->short_description !!}</td>
                                                <td>{{ $product->product_category->name }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>{{ $product->updated_at }}</td>
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('admin.product.show', ['product' => $product->id]) }}">
                                                        Edit</a>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick=" return confirm('Are you sure you want to delete this product?')">
                                                            Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <td>No Data</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
