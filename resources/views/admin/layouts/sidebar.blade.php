<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-list"></i>
            </button>
            <div class="sidebar-logo">
                <a href="/admin">Alumni</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="/admin" class="sidebar-link">
                    <i class="lni lni-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-pencil-alt"></i>
                    <span>Data Alumni</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-notepad"></i>
                    <span>Akses Lowongan Kerja</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-calendar"></i>
                    <span>Akses Lowongan Magang</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Profile</span>
            </a>
        </div>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <div class="main p-3">
        @yield('content')
    </div>
</div>
