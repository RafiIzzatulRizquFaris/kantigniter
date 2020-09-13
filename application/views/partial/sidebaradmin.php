<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fa fa-cutlery" aria-hidden="true"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Kantigniter</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Dashboard
			</div>

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php echo $this->uri->segment(2) == 'index' ? 'active': '' ?>">
				<a class="nav-link" href="<?php echo site_url('Admin/index');?>">
					<i class="fas fa-fw fa-database"></i>
					<span>Data Customer</span></a>
			</li>

			<li class="nav-item <?php echo $this->uri->segment(2) == 'datauser' ? 'active': '' ?>">
				<a class="nav-link" href="<?php echo site_url('Admin/datauser');?>">
					<i class="fas fa-fw fa-database"></i>
					<span>Data User</span></a>
			</li>

			<!-- Nav Item - Charts -->
			<li class="nav-item <?php echo $this->uri->segment(2) == 'dataproduct' ? 'active': '' ?>">
				<a class="nav-link" href="<?php echo site_url('Admin/dataproduct');?>">
					<i class="fas fa-fw fa-database"></i>
					<span>Data Product</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Account
			</div>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" data-toggle="modal" data-target="#logoutModal">
					<i class="fa fa-minus-circle"></i>
					<span>Sign Out</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

		</ul>