{{-- Sidebar Menu --}}
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ ($page['parent'] ?? '') == '' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <!-- Barangays -->
        <li class="nav-item has-treeview {{ ($page['parent'] ?? '') == 'election' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ($page['parent'] ?? '') == 'election' ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Barangays
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('barangays.index') }}"
                        class="nav-link {{ ($page['child'] ?? '') == 'subfield1' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Barangay</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
