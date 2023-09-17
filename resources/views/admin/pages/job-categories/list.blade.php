@extends('admin.layout.master')
@section('content')
<style>
    .table>tbody>tr>td {
        vertical-align: 0%;
    }
</style>
    <div class="right_col" role="main">
        <div class="">
            <a href="{{ route('admin.job-categories.create') }}" style="float: right; margin-top:5px" type="button"
                class="btn btn-primary">Create New Job Categories</a>
            <form method="get">
                {{-- @csrf --}}
                <div style="display: flex; justify-content:flex-end;align-items:center" class="page-title">
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table design <small>Custom design</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p>Add class <code>bulk_action</code> to table for bulk actions options on row select
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">ID</th>
                                            <th class="column-title">Occupation</th>
                                            <th class="column-title">Required age</th>
                                            <th class="column-title">Salary range</th>
                                            <th class="column-title">Number of recruits</th>
                                            <th class="column-title">Recruitment status</th>
                                            <th class="column-title no-link last"><span class="nobr">Created_at</span>
                                            </th>
                                            <th class="column-title no-link last"><span class="nobr">Updated_at</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions
                                                    (
                                                    <span class="action-cnt"> </span> ) <i
                                                        class="fa fa-chevron-down"></i></a>
                                            </th>
                                            <th class="column-title">Detail</th>
                                            <th class="column-title">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($jobCategories as $jobCategory)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td>
                                                <td class=" ">{{ $loop->iteration }}</td>
                                                <td class=" ">{{ $jobCategory->occupation }}</td>
                                                <td class=" ">{{ $jobCategory->required_age }}</td>
                                                <td class=" ">{{ $jobCategory->salary_range }}</td>
                                                <td class=" ">{{ $jobCategory->number_of_recruits }}</td>
                                                <td class=" ">
                                                    {{ $jobCategory->recruitment_status ? 'No recruitment' : 'Still recruiting' }}
                                                </td>
                                                <td class=" ">{{ $jobCategory->created_at }}</td>
                                                <td class=" ">{{ $jobCategory->updated_at }}</td>
                                                <td class=" "><a class="btn btn-primary"
                                                        href="{{ route('admin.job-categories.show', ['job_category' => $jobCategory->id]) }}">
                                                        Edit</a>
                                                </td>
                                                <td class=" ">
                                                    <form
                                                        action="{{ route('admin.job-categories.destroy', ['job_category' => $jobCategory->id]) }}"
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
                                            <td class=" ">No Data</td>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div style="display: flex; justify-content:flex-end" class="btn-group">
                                @for ($i = 1; $i <= $totalPagination; $i++)
                                    <a href="?page={{ $i }}" class="btn btn-info"
                                        type="button">{{ $i }}</a>
                                @endfor
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
