@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Employee</h4>
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.employee-list.store') }}"
                            class="form-horizontal form-label-left" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="avatar">Avatar </label>
                                <input id="avatar" class="form-control" data-validate-length-range="6"
                                    data-validate-words="2" name="avatar" multiple placeholder="both name(s) e.g Jon Doe"
                                    type="file">
                                @error('avatar')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
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
                                <label for="slug">Slug</label>
                                <input value="{{ old('slug') }}" id="slug" class="form-control"
                                    data-validate-length-range="6" data-validate-words="2" name="slug"
                                    placeholder="both name(s) e.g Jon Doe" type="text">
                                @error('slug')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="email">Email</label>
                                <input value="{{ old('email_id') }}" id="email_id" class="form-control"
                                    data-validate-length-range="6" data-validate-words="2" name="email_id"
                                    placeholder="both name(s) e.g Jon Doe" type="text">
                                @error('email_id')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input value="{{ old('age') }}" type="number" id="age" name="age"
                                    class="form-control">
                                @error('age')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="email" name="gender" class="form-control">
                                    <option value="">Choose option</option>
                                    <option {{ old('gender') === '1' ? 'selected' : '' }} value="1">Male
                                    </option>
                                    <option {{ old('gender') === '0' ? 'selected' : '' }} value="0">Female
                                    </option>
                                </select>
                                @error('gender')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Telephone</label>
                                <input value="{{ old('phone') }}" type="tel" id="phone" name="phone"
                                    data-validate-length-range="8,20" class="form-control">
                                @error('phone')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <select id="occupation" name="occupation" class="form-control">
                                    <option value="">Choose option</option>
                                    @foreach ($jobCategories as $jobCategory)
                                        <option value="{{ $jobCategory->id }}"> {{ $jobCategory->occupation }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('occupation')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                                @error('description')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button"
                                    onclick="window.location.href='{{ route('admin.employee-list.index') }}'"
                                    class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- basic form end -->
    @endsection
    @section('js-custom')
        <script>
            ClassicEditor
                .create(document.querySelector('#description'), {
                    ckfinder: {
                        // Upload the images to the server using the CKFinder QuickUpload command.
                        uploadUrl: '{{ route('admin.employee-list.ckeditor.upload.image') . '?_token=' . csrf_token() }}'
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#name').on('keyup', function() {
                    var name = $('#name').val();
                    $.ajax({
                        method: "POST", //method of form
                        url: "{{ route('admin.employee-list.create.slug') }}", //action of form
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
