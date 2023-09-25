@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Job Category</h4>
                        <form method="post" action="{{ route('admin.job-categories.store') }}"
                            class="form-horizontal form-label-left" novalidate>
                            <div class="form-group">
                                <label class="control-label" for="name">Occupation</label>
                                <input value="{{ old('occupation') }}" id="occupation" class="form-control"
                                    data-validate-length-range="6" data-validate-words="2" name="occupation"
                                    placeholder="both name(s) e.g Jon Doe" type="text">
                                @error('occupation')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Required Age</label>
                                <input value="{{ old('required_age') }}" type="text" id="required_age"
                                    name="required_age" class="form-control">
                                @error('required_age')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="salary_range">Salary Range</label>
                                <input value="{{ old('salary_range') }}" type="text" id="salary_range"
                                    name="salary_range" data-validate-length-range="8,20" class="form-control">
                                @error('salary_range')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">Recruitment Status</label>
                                <select id="email" name="recruitment_status" class="form-control">
                                    <option value="">Choose option</option>
                                    <option {{ old('recruitment_status') === '1' ? 'selected' : '' }} value="1">No
                                        recruitment
                                    </option>
                                    <option {{ old('recruitment_status') === '0' ? 'selected' : '' }} value="0">
                                        Still recruiting
                                    </option>
                                </select>
                                @error('recruitment_status')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Number of recruits</label>
                                <input value="" type="number" name="number_of_recruits" data-validate-length="6,8"
                                    class="form-control">
                                @error('number_of_recruits')
                                    <div style="white-space:nowrap ;opacity: 1;max-width: 100%;margin-top:10px"
                                        class="alert alert-danger">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button"
                                    onclick="window.location.href='{{ route('admin.job-categories.index') }}'"
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
