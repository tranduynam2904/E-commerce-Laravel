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
                {{-- <div style="display: flex;justify-content:end"><a href="{{ route('admin.client-account.create') }}"
                        style="color:white" class="btn btn-primary mb-3">Create New Client</a></div> --}}
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
                                        @forelse($clients as $client)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->email }}</td>
                                                @if (Auth::check() && Auth::user()->id == $client->id)
                                                    <td style="color:#79AC78;font-weight: bold;">Online</td>
                                                @else
                                                    <td style="color:#C70039;font-weight: bold;">Offline</td>
                                                @endif
                                                <td>
                                                    {{-- Foreach role by Spatie method --}}
                                                    @forelse ($client->roles as $role)
                                                        {{ $role->name }}
                                                    @empty
                                                        No role assigned
                                                    @endforelse
                                                </td>
                                                <td>{{ $client->created_at }}</td>
                                                <td>{{ $client->updated_at }}</td>
                                                <td><a class="btn btn-primary"
                                                        href="{{ route('admin.client-account.show', ['client_account' => $client->id]) }}">Edit</a>
                                                </td>
                                                <td class="">
                                                    <form method="post"
                                                        action="{{ route('admin.client-account.destroy', ['client_account' => $client->id]) }}">
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
                                {{ $clients->links('admin.pages.my-pagination.bootstrap-4') }}
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
