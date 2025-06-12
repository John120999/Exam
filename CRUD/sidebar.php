
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light">Music</span>
    </a>

    <div class="sidebar d-flex flex-column" style="height: 100vh;">
        <nav class="mt-2 flex-grow-1">
            <ul class="nav nav-pills nav-sidebar flex-column h-100" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="artists.php" class="nav-link <?php echo ($activePage == 'artists') ? 'active' : ''; ?> ">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Artists </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="albums.php" class="nav-link <?php echo ($activePage == 'albums') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-car"></i>
                        <p> Albums </p>
                    </a>
                </li>
              
                <li class="nav-item mt-auto">
                    <a href="#" class="nav-link text-danger" onclick="logout(); return false;">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>