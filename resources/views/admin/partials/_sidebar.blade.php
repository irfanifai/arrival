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
            <li><a class="nav-link" href="{{ route('admin.home') }}"><i class="fas fa-home"></i> <span>Halaman Utama</span></a></li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.users.index') }}" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.users.index') }}">Daftar Pengguna</a></li>
                    <li><a href="{{ route('admin.users.create') }}">Buat Pengguna Baru</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.posts.index') }}" class="nav-link has-dropdown"><i class="far fa-edit"></i> <span>Blog Artikel</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.posts.index') }}">Semua Artikel</a></li>
                    <li><a href="{{ route('admin.posts.create') }}">Buat Artikel</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Kategori Artikel</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.comments.index') }}"><i class="far fa-comment-alt"></i> <span>Komentar</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="fas fa-info"></i> <span>Tentang Kami</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.messages.index') }}"><i class="fas fa-envelope"></i></i> <span>Pesan</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog"></i> <span>Pengaturan Footer</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split">Logout</button>
            </form>
        </div>

    </aside>
</div>
