@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Permission</h4>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.employee-list.update', ['employee_list' => $employees->id]) }}"
                            class="form-horizontal form-label-left" novalidate>
                            @method('put')
                            @csrf
                            <span class="section">Personal Info</span>
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
