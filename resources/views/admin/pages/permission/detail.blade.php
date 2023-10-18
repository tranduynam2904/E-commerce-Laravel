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
                        <h4 class="header-title">Update Permission</h4>
                        <form method="POST"
                            action="{{ route('admin.permission.update', ['permission' => $permission->id]) }}"
                            class="form-horizontal form-label-left" novalidate>
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="name">Name</label>
                                <input id="name" class="form-control" data-validate-length-range="6"
                                    data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe"
                                    type="text" value="{{ $permission->name }}">
                                @error('name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="guard_name">Guard Name</label>
                                <input readonly id="guard_name" class="form-control" data-validate-length-range="6"
                                    data-validate-words="2" name="guard_name" placeholder="both name(s) e.g Jon Doe"
                                    type="text" value="{{ $permission->guard_name }}">
                                @error('guard_name')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button"
                                    onclick="window.location.href='{{ route('admin.permission.index') }}'"
                                    class="btn btn-primary">Cancel</button>
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="control-label" for="role_permission">Permission Roles</div>
                            @if ($permission->roles)
                                @foreach ($permission->roles as $permission_role)
                                    <form method="post"
                                        action="{{ route('admin.permission.role.remove', ['permission' => $permission->id, 'role' => $permission_role->id]) }}">
                                        <div class="btn btn-info">{{ $permission_role->name }}</div>
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            onclick=" return confirm('Are you sure you want to revoke this permission from role?')">Delete</button>
                                    </form>
                                @endforeach
                            @endif
                            @error('guard_name')
                                <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                    class="alert alert-danger">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <form method="POST"
                                action="{{ route('admin.permission.role.assign', ['permission' => $permission->id]) }}"
                                class="form-horizontal form-label-left" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Roles</label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="">Choose option</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                            class="alert alert-danger">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="button" onclick="window.location.href='{{ route('admin.role.index') }}'"
                                        class="btn btn-primary">Cancel</button>
                                    <button id="submit" type="submit" class="btn btn-success">Assign</button>
                                </div>
                            </form>
                        </div>
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
