@extends('admin.layout.master')
@section('content')

        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- basic form start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Create Employee Account</h4>
                            <form enctype="multipart/form-data" method="post"
                                action="{{ route('admin.employee-account.store') }}" class="form-horizontal form-label-left"
                                novalidate>
                                @csrf
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
                                    <label for="email">Email</label>
                                    <input value="{{ old('email') }}" id="email" class="form-control"
                                        data-validate-length-range="6" data-validate-words="2" name="email"
                                        placeholder="both name(s) e.g Jon Doe" type="text">
                                    @error('email')
                                        <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                            class="alert alert-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="">Choose option</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"> {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                            class="alert alert-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="button"
                                        onclick="window.location.href='{{ route('admin.employee-account.index') }}'"
                                        class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- basic form end -->
@endsection

