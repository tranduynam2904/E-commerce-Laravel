@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Role</h4>
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.employee-list.store') }}"
                            class="form-horizontal form-label-left" novalidate>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- basic form end -->
    @endsection
