@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Job Category</h4>
                        <form method="POST"
                            action="{{ route('admin.product-category.update', ['product_category' => $product_category->id]) }}"
                            class="form-horizontal form-label-left" novalidate>
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="control-label" for="occupation">Name</label>
                                <input value="{{ $product_category->name }}" id="occupation" type="text" name="name"
                                    data-validate-length-range="5,20" class="form-control">
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Choose option</option>
                                    <option {{ old('status', $product_category->status) === 1 ? 'selected' : '' }}
                                        value="1">Show</option>
                                    <option {{ old('status', $product_category->status) === 0 ? 'selected' : '' }}
                                        value="0">Hide</option>
                                </select>
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <button type="button"
                                    onclick="window.location.href='{{ route('admin.product-category.index') }}'"
                                    class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
