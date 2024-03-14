<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            LARABASE
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            {{--<li class="nav-item">
                <a href="dashboard-one.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Apps</li>
            @can("user_access")
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#user-management" role="button" aria-expanded="false"
                       aria-controls="user-management">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">User Management</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="user-management">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route("user-management.permissions.index")}}" class="nav-link">Permissions</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("user-management.roles.index")}}" class="nav-link">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("user-management.users.index")}}" class="nav-link">Users</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#settings" role="button" aria-expanded="false"
                       aria-controls="settings">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Settings</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Client Statuses</a>
                            </li>
                        </ul>
                    </div>
                </li>--}}
            @include("admin.layouts.routes")
        </ul>
    </div>
</nav>
