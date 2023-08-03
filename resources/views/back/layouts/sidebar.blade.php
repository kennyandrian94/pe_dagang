<div class="site-menubar">
    <div class="site-menubar-body">
        <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">General</li>
            <li class="site-menu-item @if(Request::is('admin/dashboard*')) active @endif">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                </a>
            </li>
            <li class="site-menu-item @if(Request::is('admin/admins*')) active @endif">
                <a href="{{ route('admin.admins.index') }}">
                    <i class="site-menu-icon fa-user" aria-hidden="true"></i>
                    <span class="site-menu-title">Admin</span>
                </a>
            </li>
            {{-- <li class="site-menu-item @if(Request::is('admin/users*')) active @endif">
                <a href="{{ route('admin.users.index') }}">
                    <i class="site-menu-icon fa-user-circle" aria-hidden="true"></i>
                    <span class="site-menu-title">User</span>
                </a>
            </li> --}}
            <li class="site-menu-item @if(Request::is('admin/customers*')) active @endif">
                <a href="{{ route('admin.customers.index') }}">
                    <i class="site-menu-icon fa-user-circle" aria-hidden="true"></i>
                    <span class="site-menu-title">Customer</span>
                </a>
            </li>
            <li class="site-menu-item @if(Request::is('admin/products*')) active @endif">
                <a href="{{ route('admin.products.index') }}">
                    <i class="site-menu-icon fa-tag" aria-hidden="true"></i>
                    <span class="site-menu-title">Product</span>
                </a>
            </li>
            <li class="site-menu-item @if(Request::is('admin/orders*')) active @endif">
                <a href="{{ route('admin.orders.index') }}">
                    <i class="site-menu-icon fa-shopping-bag" aria-hidden="true"></i>
                    <span class="site-menu-title">Order</span>
                </a>
            </li>
        </ul>
    </div>
</div>