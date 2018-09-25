<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
<nav class="navbar navbar-expand-sm navbar-default">
    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>
            <h3 class="menu-title">Admin Area</h3><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="" data-toggle="dropdown"> <i class="menu-icon fa fa-table"></i>Database</a>
                <ul class="sub-menu children">
                    <li><i class="fa fa-user-circle-o"></i><a href="tables-data-users.php">All Users</a></li>
                    <li><i class="fa fa-plug"></i><a href="tables-data-users.php?filter=online">Online Users</a></li>
                    <li><i class="fa fa-building-o"></i><a href="tables-data-whitelist.php">Whitelisted Jobs</a></li>
                    <li><i class="fa fa-ban"></i><a href="tables-data-banned-users.php">Banned Users</a></li>

                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="" data-toggle="dropdown"> <i class="menu-icon fa fa-lock"></i>Admin</a>
                <ul class="sub-menu children">
                    <?php if(isSuperAdmin($_SESSION['id']) == true): ?>
                      <li><i class="fa fa-user-circle-o"></i><a href="manage-admins.php">Mange Admins</a></li>
                    <?php endif; ?>
                    <li><i class="fa fa-sign-out"></i><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
