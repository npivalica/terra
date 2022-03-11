<nav id="sidebarMenu" class="bg-light">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <span>Users</span>
            <i class="fas fa-users"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.posts') }}">
            <span>Posts</span>
            <i class="fas fa-sticky-note"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.categories') }}">
            <span>Categories</span>
            <i class="fas fa-sitemap"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.menus') }}">
            <span>Menus</span>
            <i class="fas fa-route"></i>
          </a>
        </li>
      </ul>
    </div>
</nav>
