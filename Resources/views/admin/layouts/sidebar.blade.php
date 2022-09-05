
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link {{ Route::is('admin.') || Route::is('admin.')  ? 'active' : '' }}">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @can('view popup')
                        <li class="nav-item">
                            <a href="{{ url('admin/popup') }}" class="nav-link {{ Route::is('admin.popup.*') || Route::is('admin.popup.*')  ? 'active' : '' }}">
                                <i class="fas fa-warehouse nav-icon"></i>
                                <p>Popup</p>
                            </a>
                        </li>
                        @endcan 
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>