<!DOCTYPE html>
<html>

<body>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">API</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">
            Users
        </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-cog"></i>
                        <span>Usuarios</span>
                </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('user.index') }}">Consultar</a>
                            <a class="collapse-item" href="{{ route('user.create') }}">Crear</a>
                        </div>
                    </div>
            </li>

        <div class="sidebar-heading">
            Products
        </div>
            <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-cog"></i>
                        <span>Productos</span>
                    </a>
                        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('product.index') }}">Consultar</a>
                                <a class="collapse-item" href="{{ route('product.create') }}">Crear</a>
                            </div>
                        </div>
            </li>

            <div class="sidebar-heading">
            Recipes
        </div>
            <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecipes"
                    aria-expanded="true" aria-controls="collapseRecipes">
                    <i class="fas fa-fw fa-cog"></i>
                        <span>Recetas</span>
                    </a>
                        <div id="collapseRecipes" class="collapse" aria-labelledby="headingRecipes" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('recipe.index') }}">Consultar</a>
                                <a class="collapse-item" href="{{ route('recipe.create') }}">Crear</a>
                            </div>
                        </div>
            </li>

            
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

</body>

</html>
