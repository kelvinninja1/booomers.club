    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <img src="../static/vendorhome/img/ourco_logo_small.png" alt="" title="" width="48" height="50"/>
        </div>
        <div class="sidebar-brand-text mx-3">Ourcomunity <sup><small>.net</small></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../pages">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php if ($powerstatus['is_superadmin']): ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Management
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operation:</h6>
            <a class="collapse-item" href="../admin/">Admins</a>
            <a class="collapse-item" href="../admin/">Investment Plans</a>
            <a class="collapse-item" href="../admin/">Payment Method</a>
            <a class="collapse-item" href="../admin/">Site Settings</a>
          </div>
        </div>
      </li>
      <?php endif; ?>
      <!-- Nav Item - Utilities Collapse Menu -->

      <?php if ($powerstatus['is_admin']): ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Admin</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations:</h6>
            <a class="collapse-item" href="../admin/manageFunds">Funds</a>
            <a class="collapse-item" href="../admin/manageInvestments">Investments</a>
            <a class="collapse-item" href="../admin/manageMembers">Members</a>
            <a class="collapse-item" href="../admin/manageReturns">Returns</a>
            <a class="collapse-item" href="../admin/manageWithdraws">Withdraws</a>
            <a class="collapse-item" href="../admin/manageSettlements">Settlements</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaff" aria-expanded="true" aria-controls="collapseStaff">
          <i class="fas fa-fw fa-plus-circle"></i>
          <span>Staff</span>
        </a>
        <div id="collapseStaff" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Addons:</h6>
            <a class="collapse-item" href="https://webmail.Ourcomunity.net">Webmail</a>
            <a class="collapse-item" href="https://dashboard.tawk.to/login">LiveChat</a>
            <!-- <a class="collapse-item" href="../admin/manageReports">Reports</a> -->
            <!-- <a class="collapse-item" href="../admin/Stats">Stats</a> -->
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php endif; ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        Deck
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-wallet"></i>
          <span>Funds</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Wallet:</h6>
            <a class="collapse-item" href="">Add Funds</a>
            <a class="collapse-item" href="">Withdraw Funds</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Extras:</h6>
            <a class="collapse-item" href="">Activity Log</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="../pages/funds">
          <i class="fas fa-fw fa-wallet"></i>
          <span>Wallet/Funds</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="../pages/assets">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Investments</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#getStartedModal">
          <div class="text-white">
          <i class="fas fa-info-circle"></i> <span> How to Get Started </span>
          </div>
        </a>
      </li>


      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>Social</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
