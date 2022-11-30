<div class="main">
	<nav class="navbar navbar-expand navbar-light navbar-bg">
		<a class="sidebar-toggle js-sidebar-toggle">
			<i class="hamburger align-self-center"></i>
		</a>
		<div class="navbar-collapse collapse">
			<ul class="navbar-nav navbar-align">
				<li class="nav-item dropdown">
					<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
						<i class="align-middle" data-feather="settings"></i>
					</a>
					<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
						<img src="../storage/profile/<?php echo clean($_SESSION['user']['user_photo']); ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo clean($_SESSION['user']['user_full_name']); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="edit-user.php?edit=<?php echo clean($_SESSION['user']['user_id']); ?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="settings.php"><i class="align-middle me-1" data-feather="settings"></i> Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.php"><i class="align-middle me-1" data-feather="log-out"></i>Log out</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>