@extends('admin.layout.master')
@section('content')
@if (session('message'))
<div id="flash-message" class="alert alert-success">
    {{ session('message') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById('flash-message').style.display = 'none';
    }, 3000); // 2 giây
</script>
@endif
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Product Category</h4>
                        {{-- <div class="form-group">
                                <label class="control-label" for="occupation">Name</label>
                                <input value="{{ $product_category->name }}" id="occupation" type="text" name="name"
                                    data-validate-length-range="5,20" class="form-control">
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        @if ($homeProductCategories)
                            @foreach ($homeProductCategories as $homeProductCategory)
                                <form method="post"
                                    action="{{ route('admin.home-product-category.delete', ['home_product_category' => $homeProductCategory->id]) }}">
                                    <div class="btn btn-info">{{ $homeProductCategory->name }}</div>
                                    {{-- <div class="btn btn-info">{{ $homeProductCategory->name }}</div> --}}
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"
                                        onclick=" return confirm('Are you sure you want to remove this product category?')">Delete</button>
                                </form>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ route('admin.home-product-category.store') }}"
                            class="form-horizontal form-label-left" novalidate>
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="name">Name</label>
                                <select class="form-control" name="name" id="name">
                                    <option value="">Choose option</option>
                                    @foreach ($productCategories as $key => $productCategory)
                                        <option value="{{ $productCategory->name }}">{{ $productCategory->name }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('status')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                {{-- <button type="button"
                                    onclick="window.location.href='{{ route('admin.product-category.index') }}'"
                                    class="btn btn-primary">Cancel</button> --}}
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
