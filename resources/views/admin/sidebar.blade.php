<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active"><a href="{{ route('admin.dashboard') }}"><i
                                class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    </li>
                    <li class="active"><a href="{{ route('admin.employee-list.index') }}"><i class="fa fa-table"></i>
                            <span>Employee List</span></a></li>
                    </li>
                    <li class="active"><a href="{{ route('admin.job-categories.index') }}"><i class="fa fa-table"></i>
                            <span>Job Categories</span></a></li>
                    <li class="active"><a href="{{ route('admin.roles.index') }}"><i class="fa fa-table"></i>
                            <span>Roles</span></a></li>
            </nav>
        </div>
    </div>
</div>
