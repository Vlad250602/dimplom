<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin-products') }}" class="nav-link {{ Request::is('admin-products') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-bag"></i>
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin-users') }}" class="nav-link {{ Request::is('admin-users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin-orders') }}" class="nav-link {{ Request::is('admin-orders') ? 'active' : '' }}">
        <i class="nav-icon fas fa-money-check"></i>
        <p>Orders</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin-sliders') }}" class="nav-link {{ Request::is('admin-sliders') ? 'active' : '' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Sliders</p>
    </a>
</li>
