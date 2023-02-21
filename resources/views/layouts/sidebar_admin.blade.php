<div class="sidebar d-print-none">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i aria-hidden="false" class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Categoria</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-shopping-cart"></i> Productos
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ url('/admin/productos/create') }}" class="nav-link">
                        <i aria-hidden="false" class="nav-icon fas fa-plus"></i> Nuevo Producto </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/productos') }}" class="nav-link">
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Listado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/precios') }}" class="nav-link">
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Listado Pecio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventario.index')}}" class="nav-link">
                        <i aria-hidden="false" class="nav-icon icon-puzzle"></i>Inventario</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i aria-hidden="false" class="nav-icon fas fa-shopping-cart"></i> Ventas
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                    <a href="{{ url('/admin/venta') }}" class="nav-link">
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Lista de Venta </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/admin/venta/create') }}" class="nav-link">
                        <i aria-hidden="false" class="nav-icon fas fa-plus"></i> Nota de Venta </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/venta/add/xml') }}" class="nav-link">
                            <i aria-hidden="false" class="nav-icon fas fa-plus"></i> Cargar Factura </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                  <i class="nav-icon far fa-file"></i> Compras
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/compras') }}" >
                        <i aria-hidden="falsse" class="nav-icon fa fa-align-justify"></i> Listado Compras </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/compras/create') }}" >
                        <i aria-hidden="false" class="nav-icon fas fa-plus"></i> Agregar Compra </a>
                    </li>
                                       
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon far fa-file"></i> Proveedor
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/proveedor') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Listado Proveedor </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/proveedor/create') }}" >
                        <i aria-hidden="false" class=" nav-icon fas fa-plus"></i> Agregar Provedor </a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon far fa-file"></i> Cliente
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/cliente') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Listar Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/cliente/create') }}" >
                            <i aria-hidden="false" class="nav-icon fas fa-plus"></i> Agregar Cliente </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon far fa-file"></i> Informes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/info/stock') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/info/rotacion') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Rotacion</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/cliente/create') }}" >
                            <i aria-hidden="false" class="nav-icon fas fa-plus"></i> Agregar Cliente </a>
                    </li> --}}
                </ul>
            </li>
           
            
            <li class="nav-title">Configuracion</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-user"></i> Usuario
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/compra/create') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Listar</a>
                    </li>
                </ul>

            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-user"></i> Archivos
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/archivos/unidades') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Unidades Medidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/archivos/lineas') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Lineas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/archivos/familias') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Familias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/archivos/marcas') }}" >
                        <i aria-hidden="false" class="nav-icon fa fa-align-justify"></i> Marcas</a>
                    </li>
                </ul>

            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon icon-user"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon icon-user"></i> Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon icon-lock"></i> Empresa
                </a>
            </li> --}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>