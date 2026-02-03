<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Dropdown -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#dashboard-menu" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="dashboard-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admindashboard-index') }}">
                        <i class="bi bi-circle"></i><span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </li>

         <!-- Gst Dropdown -->
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#gst-menu" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i>
                <span>Gst</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="gst-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('gst-index') }}">
                        <i class="bi bi-circle"></i><span>Gst</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Job Dropdown -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#job-menu" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i>
                <span>Job</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="job-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('jobs-index') }}">
                        <i class="bi bi-circle"></i><span>Jobs</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Master Dropdown -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#master-menu" data-bs-toggle="collapse" href="#">
                <i class="bi bi-grid"></i>
                <span>Master</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="master-menu" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                <li><a href="{{ route('users-index') }}"><i class="bi bi-circle"></i><span>Users</span></a></li>
                <li><a href="{{ route('customers-index') }}"><i class="bi bi-circle"></i><span>Customers</span></a></li>
                <li><a href="{{ route('parts-index') }}"><i class="bi bi-circle"></i><span>Parts</span></a></li>
                <li><a href="{{ route('carmodels-index') }}"><i class="bi bi-circle"></i><span>Car Models</span></a></li>
                <li><a href="{{ route('cars-index') }}"><i class="bi bi-circle"></i><span>Cars</span></a></li>
                <li><a href="{{ route('employeetypes-index') }}"><i class="bi bi-circle"></i><span>Employee Types</span></a></li>
                <li><a href="{{ route('employees-index') }}"><i class="bi bi-circle"></i><span>Employees</span></a></li>

            </ul>
        </li>
    </ul>
</aside>
