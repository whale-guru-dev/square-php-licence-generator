<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">

            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"></div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            <li class="nav-item  @if(request()->path() == 'admin/home') active open @endif">
                <a href="{{url('admin/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item
            @if(request()->path() == 'admin/users') active open
                @elseif(request()->path() == 'admin/user/search') active open
            @endif">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">User Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/users') active open
                    @elseif(request()->path() == 'admin/user/search') active open
                    @endif">
                        <a href="{{route('users')}}" class="nav-link ">
                            <i class="fa fa-users"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
{{--                    <li class="nav-item @if(request()->path() == 'admin/bot-info') active open--}}
{{--                    @endif">--}}
{{--                        <a href="{{route('bot.info')}}" class="nav-link ">--}}
{{--                            <i class="fa fa-link"></i>--}}
{{--                            <span class="title">Bot Info</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>

            <li class="nav-item @if(request()->path() == 'admin/plan/index') active open @endif">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Plan Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == route('plans.index')) active open @endif">
                        <a href="{{route('plans.index')}}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Plans</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item @if(request()->path() == 'admin/transaction') active open @endif">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Transaction</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/transaction') active open @endif">
                        <a href="{{route('transaction.index')}}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Transactions</span>
                        </a>
                    </li>
                </ul>
            </li>

            @if(Auth::guard('admin')->user()->role == 0)
                <li class="nav-item">
                    <a href="{{route('stuff.home')}}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Stuff Management</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
