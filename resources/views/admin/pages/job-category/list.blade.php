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
    <div class="main-content-inner">
        <div class="row">
            <!-- table primary start -->
            <div class="col-lg-12 mt-5">
                <div style="display: flex;justify-content:end;margin-bottom:30px;"><a href="{{ route('admin.job-category.create') }}"
                        style="color:white" class="btn btn-primary">Create New Job
                        Categories</a></div>
                {{-- <div class="col-md-6 col-sm-8 clearfix">
                    <div class="search-box pull-left">
                        <form method="get">
                            <input class="form-control" type="text" name="keyword" placeholder="Search..." required>
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Thead Primary</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table id ="table" class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Occupation</th>
                                            <th scope="col">Required age</th>
                                            <th scope="col">Salary range</th>
                                            <th scope="col">Number of recruits</th>
                                            <th scope="col">Recruitment status</th>
                                            <th scope="col">Created_at</th>
                                            <th scope="col">Updated_at</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobCategories as $jobCategory)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $jobCategory->occupation }}</td>
                                                <td>{{ $jobCategory->required_age }}</td>
                                                <td>{{ $jobCategory->salary_range }}</td>
                                                <td>{{ $jobCategory->number_of_recruits }}</td>

                                                <td>{{ $jobCategory->recruitment_status ? 'No recruitment' : 'Still recruiting' }}
                                                </td>
                                                <td>{{ $jobCategory->created_at }}</td>
                                                <td>{{ $jobCategory->updated_at }}</td>
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('admin.job-category.show', ['job_category' => $jobCategory->id]) }}">
                                                        Edit</a>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.job-category.destroy', ['job_category' => $jobCategory->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick=" return confirm('Are you sure you want to delete this job categories?')">
                                                            Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <td>No Data</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection

