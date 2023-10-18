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
    <style>

    </style>
    <div class="main-content-inner">
        <div class="row">
            <!-- table primary start -->
            <div class="col-lg-12 mt-5">
                <div style="display: flex;justify-content:end;margin-bottom:30px;"><a href="{{ route('admin.employee-account.create') }}"
                        style="color:white" class="btn btn-primary mb-3">Create New Employee</a></div>
                {{-- <div style="" class="col-md-6 col-sm-8 clearfix">
                    <div class="search-box pull-left">
                        <form method="get">
                            <input class="form-control" type="text" name="keyword" placeholder="Search..." required>
                            <button style="background:white" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div> --}}

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Thead Primary</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table id="table" class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Created_at</th>
                                            <th scope="col">Updated_at</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($employees as $employee)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                @if (Auth::check() && Auth::user()->id == $employee->id)
                                                    <td style="color:#79AC78;font-weight: bold;">Online</td>
                                                @else
                                                    <td style="color:#C70039;">Offline</td>
                                                @endif
                                                 {{-- Foreach role by Spatie method --}}
                                                <td>
                                                    @forelse ($employee->roles as $role)
                                                        {{ $role->name }}
                                                    @empty
                                                        No role assigned
                                                    @endforelse
                                                </td>
                                                <td>{{ $employee->created_at }}</td>
                                                <td>{{ $employee->updated_at }}</td>
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('admin.employee-account.show', ['employee_account' => $employee->id]) }}">Edit</a>
                                                </td>

                                                <td class="">
                                                    <form method="post"
                                                        action="{{ route('admin.employee-account.destroy', ['employee_account' => $employee->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick=" return confirm('Are you sure you want to delete this employee account?')">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div style="float: right; padding-top:1.25rem">
                                {{ $employees->links('admin.pages.my-pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table primary end -->
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
