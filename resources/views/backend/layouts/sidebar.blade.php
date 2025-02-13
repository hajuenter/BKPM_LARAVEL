<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard.index') ? '' : 'collapsed' }}"
                href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Product -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('product.index') ? '' : 'collapsed' }}"
                href="{{ route('product.index') }}">
                <i class="bi bi-box"></i>
                <span>Product</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
