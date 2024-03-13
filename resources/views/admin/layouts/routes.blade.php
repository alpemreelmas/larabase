@can("user_access")
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#User" role="button" aria-expanded="false"
           aria-controls="User">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">User Management</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="User">
            <ul class="nav sub-menu">
                @can("user_access")
                    <li class="nav-item">
                        <a href="http://localhost:8000/user-management/users" class="nav-link">Users</a>
                    </li>
                @endcan
                @can("role_access")
                    <li class="nav-item">
                        <a href="http://localhost:8000/user-management/roles" class="nav-link">Roles</a>
                    </li>
                @endcan

                @can("user_access")
                    <li class="nav-item">
                        <a href="http://localhost:8000/user-management/permissions" class="nav-link">Permissions</a>
                    </li>
                @endcan

            </ul>
        </div>
    </li>
@endcan
