<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard.backend') ? '' : 'collapsed' }}"
                href="{{ route('dashboard.backend') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Riwayat Hidup -->
        @php
            $isRiwayatActive =
                Request::routeIs('pendidikan.backend', 'pendidikan.backend.add', 'edit.pendidikan') ||
                Request::routeIs('pengalamankerja.backend', 'pengalamankerja.backend.add', 'pengalamankerja.edit');
        @endphp
        <li class="nav-item">
            <a class="nav-link {{ $isRiwayatActive ? '' : 'collapsed' }}" data-bs-target="#tables-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Riwayat Hidup</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse {{ $isRiwayatActive ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('pendidikan.backend') }}"
                        class="{{ Request::routeIs('pendidikan.backend', 'pendidikan.backend.add', 'edit.pendidikan') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengalamankerja.backend') }}"
                        class="{{ Request::routeIs('pengalamankerja.backend', 'pengalamankerja.backend.add', 'pengalamankerja.edit') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Pengalaman Kerja</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

    </ul>

</aside><!-- End Sidebar-->
