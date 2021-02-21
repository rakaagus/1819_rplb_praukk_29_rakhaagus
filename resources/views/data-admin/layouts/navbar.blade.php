{{-- navbar --}}
<nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">

    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded shadow-sm">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item mt-1">
            {{-- <img src="/assets/img/avatar.png" alt="" width="30" class="img-thumbnail rounded-circle p-0 shadow-sm"> --}}
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="#">Logout</a>
            </div>
        </li>
    </ul>
</nav>
{{-- end navbar --}}