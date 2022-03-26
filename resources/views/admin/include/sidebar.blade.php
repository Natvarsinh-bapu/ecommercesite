<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard')? 'active' : '' }}">
                        <i class="lnr lnr-home"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/categories') }}" class="{{ Request::is('admin/categories') || Request::is('admin/categories/*')? 'active' : '' }}">
                        <i class="lnr lnr-dice"></i> <span>Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/products') }}" class="{{ Request::is('admin/products') || Request::is('admin/products/*')? 'active' : '' }}">
                        <i class="lnr lnr-gift"></i> <span>Products</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/orders') }}" class="{{ Request::is('admin/orders') || Request::is('admin/orders/*')? 'active' : '' }}">
                        <i class="lnr lnr-list"></i> <span>Orders</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>