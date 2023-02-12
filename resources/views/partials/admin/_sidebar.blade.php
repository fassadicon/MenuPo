{{-- SideBar --}}
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


        <li id="nav-item-logo" class="nav-item">
            <a href="/admin/dashboard" class="logo d-flex align-items-center">
                <img src="{{ asset('admin/assets/img/logo-512x512.png') }}" alt="">
                <span class="d-none d-lg-block">Menu<span id="span-primary">Po</span></span>
            </a>
        </li><!-- End Logo -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/dashboard" title="Canteen Dashboard" id="sidebarLink">
                <i class="fa-solid fa-border-all"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/orders/scanner" title="Scan Student QR Code here"
                id="sidebarLink">
                <i class="fa-solid fa-qrcode"></i>
                <span>Scanner</span>
            </a>
        </li><!-- End Scanner Nav -->




        {{-- <li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="components-alerts.html">
        <i class="bi bi-circle"></i><span>Alerts</span>
      </a>
    </li>
    <li>
      <a href="components-accordion.html">
        <i class="bi bi-circle"></i><span>Accordion</span>
      </a>
    </li>
    <li>
      <a href="components-badges.html">
        <i class="bi bi-circle"></i><span>Badges</span>
      </a>
    </li>
    <li>
      <a href="components-breadcrumbs.html">
        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
      </a>
    </li>
    <li>
      <a href="components-buttons.html">
        <i class="bi bi-circle"></i><span>Buttons</span>
      </a>
    </li>
    <li>
      <a href="components-cards.html">
        <i class="bi bi-circle"></i><span>Cards</span>
      </a>
    </li>
    <li>
      <a href="components-carousel.html">
        <i class="bi bi-circle"></i><span>Carousel</span>
      </a>
    </li>
    <li>
      <a href="components-list-group.html">
        <i class="bi bi-circle"></i><span>List group</span>
      </a>
    </li>
    <li>
      <a href="components-modal.html">
        <i class="bi bi-circle"></i><span>Modal</span>
      </a>
    </li>
    <li>
      <a href="components-tabs.html">
        <i class="bi bi-circle"></i><span>Tabs</span>
      </a>
    </li>
    <li>
      <a href="components-pagination.html">
        <i class="bi bi-circle"></i><span>Pagination</span>
      </a>
    </li>
    <li>
      <a href="components-progress.html">
        <i class="bi bi-circle"></i><span>Progress</span>
      </a>
    </li>
    <li>
      <a href="components-spinners.html">
        <i class="bi bi-circle"></i><span>Spinners</span>
      </a>
    </li>
    <li>
      <a href="components-tooltips.html">
        <i class="bi bi-circle"></i><span>Tooltips</span>
      </a>
    </li>
  </ul>
</li><!-- End Components Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="forms-elements.html">
        <i class="bi bi-circle"></i><span>Form Elements</span>
      </a>
    </li>
    <li>
      <a href="forms-layouts.html">
        <i class="bi bi-circle"></i><span>Form Layouts</span>
      </a>
    </li>
    <li>
      <a href="forms-editors.html">
        <i class="bi bi-circle"></i><span>Form Editors</span>
      </a>
    </li>
    <li>
      <a href="forms-validation.html">
        <i class="bi bi-circle"></i><span>Form Validation</span>
      </a>
    </li>
  </ul>
</li><!-- End Forms Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="tables-general.html">
        <i class="bi bi-circle"></i><span>General Tables</span>
      </a>
    </li>
    <li>
      <a href="tables-data.html">
        <i class="bi bi-circle"></i><span>Data Tables</span>
      </a>
    </li>
  </ul>
</li><!-- End Tables Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a href="charts-chartjs.html">
        <i class="bi bi-circle"></i><span>Chart.js</span>
      </a>
    </li>
    <li>
      <a href="charts-apexcharts.html">
        <i class="bi bi-circle"></i><span>ApexCharts</span>
      </a>
    </li>
    <li>
      <a href="charts-echarts.html">
        <i class="bi bi-circle"></i><span>ECharts</span>
      </a>
    </li>
  </ul>
</li><!-- End Charts Nav --> --}}
        {{-- 
        <li class="nav-item">
            <!-- User Management Nav -->
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/admins">
                        <i class="bi bi-circle"></i><span>Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/guardians">
                        <i class="bi bi-circle"></i><span>Parents</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/students">
                        <i class="bi bi-circle"></i><span>Students</span>
                    </a>
                </li>
            </ul>
        </li><!-- End User Management Nav --> --}}
        <li class="nav-heading">Accounts</li>
        <li class="button-dropdown">
            <a href="javascript:void(0)" class="nav-link collapsed dropdown-toggle">
                <i class="fa-solid fa-border-all"></i> Account Management <i class="fas fa-chevron"></i>
            </a>
            <ul class="dropdown-menu">
                @if (auth()->user()->role == 2)
                    <li class="nav-item">
                        <a href="/admin/admins" class="dropdown-link nav-link collapsed" id="sidebarLink">
                            <i class="fas fa-user-cog"></i></i><span>Admin</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/admin/guardians" class="dropdown-link nav-link collapsed" id="sidebarLink">
                        <i class="fas fa-user-alt"></i><span>Parents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/students" class="dropdown-link nav-link collapsed" id="sidebarLink">
                        <i class="fas fa-user-graduate"></i><span>Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/imports" class="dropdown-link nav-link collapsed" id="sidebarLink">
                        <i class="fa-solid fa-people-roof"></i><span>Mass Creation</span>
                    </a>
                </li>
                @if (auth()->user()->role == 2)
                    <li class="nav-item">
                        <a href="/admin/imports/adminAccounts" class="dropdown-link nav-link collapsed"
                            id="sidebarLink">
                            <i class="fas fa-users-cog"></i><span>Mass Admin Creation</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        {{-- <li class="nav-item">
          <a href="/admin/reports/bmi" class="dropdown-link nav-link collapsed" id="sidebarLink">
              <i class="fab fa-nutritionix"></i>
              <span>BMI</span>
          </a>
      </li><!-- End Completed Orders Nav --> --}}

        <li class="nav-heading">Food Item Management</li>

        <li class="nav-item">
            {{-- <a class="nav-link collapsed" href="users-profile.html">
    <i class="bi bi-person"></i>
    <span>Food Item Management</span>
  </a> --}}
            <a href="/admin/foods" class="nav-link collapsed" title="Food Items" id="sidebarLink">
                <i class="fas fa-utensils"></i>
                <span>Food Items</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/menuplan/" title="Scan Student QR Code here" id="sidebarLink">
                <i class="fa-solid fa-qrcode"></i>
                <span>Menu Planner</span>
            </a>
        </li><!-- End Scanner Nav -->
        <li class="nav-item">
            <a href="/admin/menu" class="nav-link collapsed" href="pages-faq.html" title="Menu Management"
                id="sidebarLink">
                <i class="fa-solid fa-bars-progress"></i>
                <span>Menu Management</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-heading">Order Management</li>

        <li class="nav-item">
            <a href="/admin/orders/pendings" class="nav-link collapsed" title="For Orders to be Claimed Today"
                id="sidebarLink">
                <i class="fa-solid fa-person-circle-exclamation"></i>
                <span>To Claim Orders</span>
            </a>
        </li><!-- End Paid/To Claim Nav -->
        <li class="nav-item">
            <a href="/admin/orders/paymentConfirmationTable" class="nav-link collapsed" title="Unpaid Orders"
                id="sidebarLink">
                <i class="fas fa-money-bill"></i>
                <span>Pending Payment Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/admin/orders/completed" class="nav-link collapsed" title="Claimed Orders" id="sidebarLink">
                <i class="fa-solid fa-list"></i>
                <span>Completed Orders</span>
            </a>
        </li><!-- End Completed Orders Nav -->

        <li class="nav-heading">Reports and Information</li>
        <li class="nav-item">
            <a href="/admin/reports/survey" class="nav-link collapsed" title="Weekly Survey Results" id="sidebarLink">
                <i class="fas fa-poll"></i>
                <span>Parents' Survey</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/reports/compositions" class="nav-link collapsed" title="Most Bought Items in the Canteen"
                id="sidebarLink">
                <i class="fas fa-chart-pie"></i>
                <span>Order Composition</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/reports/nutrientConsumption" class="nav-link collapsed" title="Nutritional Reports"
                id="sidebarLink">
                <i class="fas fa-chevron"></i></i>
                <span>Nutritional Report</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/reports/sales" class="nav-link collapsed" title="Monthly Sales Graph" id="sidebarLink">
                <i class="fas fa-cash-register"></i>
                <span>Sales</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        {{-- <li class="nav-item">
            <a href="/admin/logs/foodMovements" class="nav-link collapsed" title="Daily Sales Report" id="sidebarLink">
                <i class="fas fa-clipboard-list"></i>
                <span>Daily Sales Report</span>
            </a>
        </li> --}}
        <!-- End Completed Orders Nav -->
        {{-- <li class="nav-heading">Logs</li>
        <li class="nav-item">
            <a href="/admin/logs/adminAccount" class="nav-link collapsed" id="sidebarLink">
                <i class="fas fa-user-tie"></i>
                <span>Admin Logs</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/logs/guardianAccount" class="nav-link collapsed" id="sidebarLink">
                <i class="fas fa-user-friends"></i>
                <span>Parent Logs</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/logs/studentAccount" class="nav-link collapsed" id="sidebarLink">
                <i class="fas fa-user-graduate"></i>
                <span>Student Logs</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/logs/bmiChanges" class="nav-link collapsed" id="sidebarLink">
                <i class="fas fa-weight"></i>
                <span>BMI Logs</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/logs/foodItems" class="nav-link collapsed" id="sidebarLink">
                <i class="fas fa-drumstick-bite"></i>
                <span>Food Logs</span>
            </a>
        </li><!-- End Completed Orders Nav -->
        <li class="nav-item">
            <a href="/admin/logs/menuChanges" class="nav-link collapsed" id="sidebarLink">
                <i class="bi bi-menu-button-wide-fill"></i>
                <span>Menu Changes</span>
            </a>
        </li><!-- End Completed Orders Nav --> --}}
        {{-- <li class="nav-heading">Nutritional Report</li>
        <li class="button-dropdown">
            <a href="javascript:void(0)" class="nav-link collapsed dropdown-toggle">
                <i class="fa-solid fa-border-all"></i> Nutritional Report <i class="fas fa-chevron"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-nav nav-item">
                    <a href="/admin/reports/nutrientConsumption" class="dropdown-link nav-link collapsed"
                        id="sidebarLink">
                        <i class="fab fa-nutritionix"></i>
                        <span>Calorie</span>
                    </a>
                </li><!-- End Completed Orders Nav -->
                <li class="nav-item">
                    <a href="/admin/reports/nutrientConsumption/totalFat" class="dropdown-link nav-link collapsed"
                        id="sidebarLink">
                        <i class="fab fa-nutritionix"></i>
                        <span>Total Fat</span>
                    </a>
                </li><!-- End Completed Orders Nav -->

                <li class="nav-item">
                    <a href="/admin/reports/nutrientConsumption/satFat" class="dropdown-link nav-link collapsed"
                        id="sidebarLink">
                        <i class="fab fa-nutritionix"></i>
                        <span>Saturated Fat</span>
                    </a>
                </li><!-- End Completed Orders Nav -->

                <li class="nav-item">
                    <a href="/admin/reports/nutrientConsumption/addedSugar" class="dropdown-link nav-link collapsed"
                        id="sidebarLink">
                        <i class="fab fa-nutritionix"></i>
                        <span>Added Sugars</span>
                    </a>
                </li><!-- End Completed Orders Nav -->

                <li class="nav-item">
                    <a href="/admin/reports/nutrientConsumption/sodium" class="dropdown-link nav-link collapsed"
                        id="sidebarLink">
                        <i class="fab fa-nutritionix"></i>
                        <span>Sodium</span>
                    </a>
                </li><!-- End Completed Orders Nav -->

                <li class="nav-item">
                    <a href="/admin/reports/bmi" class="dropdown-link nav-link collapsed" id="sidebarLink">
                        <i class="fab fa-nutritionix"></i>
                        <span>BMI</span>
                    </a>
                </li><!-- End Completed Orders Nav -->
            </ul>
        </li> --}}



        {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="pages-contact.html">
              <i class="bi bi-envelope"></i>
              <span>Contact</span>
          </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="pages-register.html">
              <i class="bi bi-card-list"></i>
              <span>Register</span>
          </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="pages-login.html">
              <i class="bi bi-box-arrow-in-right"></i>
              <span>Login</span>
          </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="pages-error-404.html">
              <i class="bi bi-dash-circle"></i>
              <span>Error 404</span>
          </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="pages-blank.html">
              <i class="bi bi-file-earmark"></i>
              <span>Blank</span>
          </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

</aside>
{{-- End Sidebar --}}

<script></script>
