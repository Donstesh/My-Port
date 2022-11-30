<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="dashboard.php">
			<span class="align-middle"><?php echo clean($site_name); ?></span>
		</a>
		<?php $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
		<ul class="sidebar-nav">
			<li class="sidebar-header">
				
			</li>
			<li class="sidebar-item <?php if($page=="dashboard.php"){echo "active";} ?>">
				<a class="sidebar-link" href="dashboard.php">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>
			<!-- Custom Menu -->
			<li class="sidebar-item <?php if($page=="aboutme.php"){echo "active";} ?>">
				<a class="sidebar-link" href="about.php">
					<i class="align-middle" data-feather="user"></i> <span class="align-middle">About Me</span>
				</a>
			</li>

			<li class="sidebar-item <?php if($page=="education.php"){echo "active";} ?>">
				<a class="sidebar-link" href="education.php">
					<i class="align-middle" data-feather="book"></i> <span class="align-middle">Education</span>
				</a>
			</li>

			<li class="sidebar-item <?php if($page=="portifolio.php"){echo "active";} ?>">
				<a class="sidebar-link" href="portifolio.php">
					<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Portifolio</span>
				</a>
			</li>


			<li class="sidebar-item <?php if($page=="contact.php"){echo "active";} ?>">
				<a class="sidebar-link" href="contact.php">
					<i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Contact</span>
				</a>
			</li>
		
			<!-- End Custom Menu -->
			<li class="sidebar-item <?php if($page=="users.php"){echo "active";} ?>">
				<a class="sidebar-link" href="users.php">
					<i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
				</a>
			</li>
			
			<li class="sidebar-item <?php if($page=="settings.php"){echo "active";} ?>">
				<a class="sidebar-link" href="settings.php">
					<i class="align-middle" data-feather="settings"></i> <span class="align-middle"> Settings</span>
				</a>
			</li>
		</ul>
	</div>
</nav>