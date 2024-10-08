<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-list"></i>
            </button>
            <div class="sidebar-logo">
                <a href="{{ route('admin') }}">Admin</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{ route('admin') }}" class="sidebar-link">
                    <i class="lni lni-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('statistik.index') }}" class="sidebar-link">
                    <i class="fa-regular fa-chart-bar"></i>
                    <span>Statistik Data Alumni</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('kuesionerAdmin.home') }}" class="sidebar-link">
                    <i class="lni lni-library"></i>
                    <span>Tracerstudy Alumni</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('dataAlumni.index') }}" class="sidebar-link">
                    <i class="lni lni-remove-file"></i>
                    <span>Data Alumni</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('lokeradmin.index') }}" class="sidebar-link">
                    <i class="lni lni-notepad"></i>
                    <span>Akses Lowongan Kerja</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('logangadmin.index') }}"class="sidebar-link">
                    <i class="lni lni-calendar"></i>
                    <span>Akses Lowongan Magang</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('pengumuman.index') }}"class="sidebar-link">
                    <i class="lni lni-alarm"></i>
                    <span>Pengumuman</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="{{ route('admin-profile') }}" class="sidebar-link">
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