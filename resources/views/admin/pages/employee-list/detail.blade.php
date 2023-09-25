@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Employee</h4>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.employee-list.update', ['employee_list' => $employees->id]) }}" class="form-horizontal form-label-left" novalidate>
                            @method('put')
                            @csrf
                            <span class="section">Personal Info</span>
                            <div class="form-group">
                                <label class="control-label" for="avatar">Avatar</label>
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
                                <label class="control-label" for="name">Name</label>
                                <input id="name" class="form-control" data-validate-length-range="6"
                                    data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe"
                                    type="text" value="{{ $employees->name }}">
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="slug">Slug</label>
                                <input value="{{ $employees->slug }}" id="slug" class="form-control"
                                    data-validate-length-range="6" data-validate-words="2" name="slug"
                                    placeholder="both name(s) e.g Jon Doe" type="text">
                                @error('slug')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input value="{{ $employees->email }}" type="email" id="email" name="email"
                                    class="form-control">
                                @error('email')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Age</label>
                                <input value="{{ $employees->age }}" type="number" id="email" name="age"
                                    class="form-control">
                                @error('age')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select id="email" name="gender" class="form-control">
                                    <option value="">Choose option</option>
                                    <option {{ $employees->gender === '1' ? 'selected' : '' }} value="1">Male
                                    </option>
                                    <option {{ $employees->gender === '0' ? 'selected' : '' }} value="0">
                                        Female
                                    </option>
                                </select>
                                @error('gender')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Telephone</label>
                                <input value="{{ $employees->phone }}" type="tel" id="phone" name="phone"
                                    data-validate-length-range="8,20" class="form-control">
                                @error('phone')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <select id="occupation" name="occupation" class="form-control">
                                    <option value="">Choose option</option>
                                    @foreach ($jobCategories as $jobCategory)
                                        <option {{ $jobCategory->id == $employees->job_categories_id ? 'selected' : '' }}
                                            value="{{ $jobCategory->id }}">{{ $jobCategory->occupation }}
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
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
        @section('js-custom')
            <script>
                ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endsection
