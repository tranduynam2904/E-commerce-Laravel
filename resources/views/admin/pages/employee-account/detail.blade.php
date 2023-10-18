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
                            action="{{ route('admin.employee-account.update', ['employee_account' => $employee_account->id]) }}"
                            class="form-horizontal form-label-left" novalidate>
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="name">Name</label>
                                <input id="name" class="form-control" data-validate-length-range="6"
                                    data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe"
                                    type="text" value="{{ $employee_account->name }}">
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input value="{{ $employee_account->email }}" type="email" id="email" name="email"
                                    class="form-control">
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
                                        @foreach ($employee_account->roles as $employee_role)
                                            <option {{ old('role', $employee_role->name) == $role->name ? 'selected' : '' }}
                                                value="{{ $role->name }}"> {{ $role->name }}
                                            </option>
                                        @endforeach
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
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
