@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Product</h4>
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.product.store') }}"
                            class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <label for="image" class="control-label">Image</label>
                                <input id="image" class="form-control" data-validate-length-range="6"
                                    data-validate-words="2" name="image" multiple placeholder="both name(s) e.g Jon Doe"
                                    type="file">
                                @error('image')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">Name</label>
                                <input value="{{ old('name') }}" id="name" class="form-control"
                                    data-validate-length-range="6" data-validate-words="2" name="name"
                                    placeholder="both name(s) e.g Jon Doe" type="text">
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="slug">Slug</label>
                                <input value="{{ old('slug') }}" id="slug" class="form-control"
                                    data-validate-length-range="6" data-validate-words="2" name="slug"
                                    placeholder="both name(s) e.g Jon Doe" type="text">
                                @error('slug')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price" class="control-label">Price</label>
                                <input type="text" name="price" data-validate-length="6,8" class="form-control">
                                @error('price')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="discount_price" class="control-label">Discount Price</label>
                                <input type="text" name="discount_price" data-validate-length="6,8" class="form-control">
                                @error('discount_price')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="weight" class="control-label">Weight</label>
                                <input type="text" name="weight" data-validate-length="6,8" class="form-control">
                                @error('weight')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_category_id">Product Category</label>
                                <select id="product_category_id" name="product_category_id" class="form-control">
                                    <option value="">Choose option</option>
                                    @foreach ($productCategories as $productCategory)
                                        <option value="{{ $productCategory->id }}"> {{ $productCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                                @error('description')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_description" class="control-label">Short Description</label>
                                <textarea class="form-control" name="short_description" id="short_description"></textarea>
                                @error('short_description')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Choose option</option>
                                    <option {{ old('status') === 1 ? 'selected' : '' }} value="1">Show</option>
                                    <option {{ old('status') === 0 ? 'selected' : '' }} value="0">Hide</option>
                                </select>
                                @error('status')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button"
                                    onclick="window.location.href='{{ route('admin.product.index') }}'"
                                    class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#short_description'), {
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '{{ route('admin.product.ckeditor.upload.image') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#description'), {
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '{{ route('admin.product.ckeditor.upload.image') . '?_token=' . csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
        // ClassicEditor
        //     .create(document.querySelector('#description'))
        //     .catch(error => {
        //         console.error(error);
        //     });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var name = $('#name').val();
                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('admin.product.create.slug') }}", //action of form
                    data: {
                        'name': name,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#slug').val(response.slug);
                    }
                });
            });
        });
    </script>
@endsection
