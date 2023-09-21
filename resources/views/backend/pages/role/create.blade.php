@extends('admin.layout.master')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Validation</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form validation <small>sub title</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form enctype="multipart/form-data" method="post"
                                action="{{ route('admin.employee-list.store') }}" class="form-horizontal form-label-left"
                                novalidate>
                                @csrf
                                <p>For alternative validation library <code>parsleyJS</code> check out in the <a
                                        href="form.html">form page</a>
                                </p>
                                <span class="section">Personal Info</span>
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">Avatar <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="avatar" class="form-control col-md-7 col-xs-12"
                                            data-validate-length-range="6" data-validate-words="2" name="avatar" multiple
                                            placeholder="both name(s) e.g Jon Doe" type="file">
                                        @error('avatar')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ old('name') }}" id="name"
                                            class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                            data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe"
                                            type="text">
                                        @error('name')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Slug <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ old('slug') }}" id="slug"
                                            class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                            data-validate-words="2" name="slug" placeholder="both name(s) e.g Jon Doe"
                                            type="text">
                                        @error('slug')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ old('email') }}" type="email" id="email" name="email"
                                            class="form-control col-md-7 col-xs-12">
                                        @error('email')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="age">Age <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ old('age') }}" type="number" id="age" name="age"
                                            class="form-control col-md-7 col-xs-12">
                                        @error('age')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
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
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Telephone
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ old('phone') }}" type="tel" id="phone" name="phone"
                                            data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                        @error('phone')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
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
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                        @error('description')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="employeeftm23" id="password" type="password" name="password"
                                            data-validate-length="6,8" class="form-control col-md-7 col-xs-12">
                                        @error('password')
                                            <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                                class="alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="button"
                                            onclick="window.location.href='{{ route('admin.employee-list.index') }}'"
                                            class="btn btn-primary">Cancel</button>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
