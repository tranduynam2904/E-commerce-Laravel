<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    @if (Auth::user()->hasAnyRole('admin', 'employee'))
                        <li class="active"><a href="{{ route('admin.dashboard') }}"><i
                                    class="ti-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="active"><a href="{{ route('admin.client-account.index') }}"><i
                                    class="fa fa-table"></i>
                                <span>Client Account</span></a></li>
                    @endif
                    @if (Auth::user()->hasRole('admin'))
                        <li class="active"><a href="{{ route('admin.job-category.index') }}"><i class="fa fa-table"></i>
                                <span>Job Categories</span></a></li>
                        <li class="active"><a href="{{ route('admin.employee-account.index') }}"><i
                                    class="fa fa-table"></i>
                                <span>Employee Account</span></a></li>
                        <li class="active"><a href="{{ route('admin.employee-list.index') }}"><i
                                    class="fa fa-table"></i>
                                <span>Employee Detail</span></a></li>
                        <li class="active"><a href="{{ route('admin.product-category.index') }}"><i
                                    class="fa fa-table"></i>
                                <span>Product Categories</span></a></li>
                        <li class="active"><a href="{{ route('admin.home-product-category.index') }}"><i class="fa fa-table"></i>
                                <span>Change Client Product Categories</span></a></li>
                        <li class="active"><a href="{{ route('admin.product.index') }}"><i class="fa fa-table"></i>
                                <span>Product List</span></a></li>
                        <li class="active"><a href="{{ route('admin.role.index') }}"><i class="fa fa-table"></i>
                                <span>Roles</span></a></li>
                        <li class="active"><a href="{{ route('admin.permission.index') }}"><i class="fa fa-table"></i>
                                <span>Permissions</span></a></li>
                    @endif


                </ul>
            </nav>
        </div>
    </div>
</div>
