<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center">
				<div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-cookie-bite"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Kantigniter</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Dashboard
			</div>

			<li class="nav-item <?php echo $this->uri->segment(2) == 'index' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('Cashier/index');?>">
                <i class="fas fa-fw fa-shopping-cart"></i>
					<span>Checkout Order</span></a>
            </li>
            
            <li class="nav-item <?php echo $this->uri->segment(2) == 'transaction' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('Cashier/transaction');?>">
                <i class="fas fa-fw fa-database"></i>
					<span>Transaction Data</span></a>
            </li>
            
            <li class="nav-item <?php echo $this->uri->segment(2) == 'topup' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('Cashier/topup');?>">
                <i class="fas fa-fw fa-wallet"></i>
					<span>Top Up Balance</span></a>
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