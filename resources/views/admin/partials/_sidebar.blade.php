<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="{{ url('/') }}">Arrival</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Ar</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin</li>
            <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.users.index') }}">List User</a></li>
                    <li><a href="{{ route('admin.users.create') }}">Create User</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-edit"></i> <span>Posts</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
                    <li><a href="{{ route('admin.posts.create') }}">Add New</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.comments.index') }}"><i class="far fa-comment-alt"></i> <span>Comments</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="fas fa-info"></i> <span>About</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.messages.index') }}"><i class="fas fa-cog"></i> <span>Message</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>

    </aside>
</div>
