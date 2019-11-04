<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistema Ventas</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="6x6" href="{{asset('images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('plugins/highlightjs/styles/darkula.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->

    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


      <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">

                </div>



                <div class="header-right">
                  <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                      <button type="button" class="btn btn-outline-danger btn-icon-text">
                        <i class="ti-user btn-icon-prepend"></i>
                        {{ Auth::User()->name}}
                      </button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a href="{{ route('logout') }}" class="dropdown-item"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <i class="ti-power-off text-primary"></i>
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/home">
                    <b class="logo-abbr">
                    <h3>SV</h3>
                         </b>
                    <span class="brand-title">
                        <center><h3>Tienda Gaby</h3></center>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menú</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people"></i><span class="nav-text">Registro</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/users">Usuarios</a></li>
                            <li><a href="/persona">Persona</a></li>
                            <li><a href="/tipo">Tipo de persona</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                  <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-basket-loaded "></i><span class="nav-text">Productos</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/categoria">Categoría</a></li>
                            <li><a href="/articulo">Articulos</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Compra/Venta</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-bag "></i> <span class="nav-text">Ingresos</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/ingreso">Ingreso</a></li>

                        </ul>

                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-basket "></i><span class="nav-text">Ventas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/venta">Venta</a></li>

                        </ul>
                    </li>
                    <br>
                    <li class="nav-label">Mas opciones</li>
                   
                        <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-docs"></i><span class="nav-text">Reportes</span>
                        </a>
                        <ul aria-expanded="false">
                          <li> <a href="{{ route('imprimir') }}">Ventas del Dia</a></li>
                          <li> <a href="{{route('productos')}}">Productos en Existencia</a></li>
                        </ul>
                        </li>
                        <li>
                        <a href="./app-profile.html">
                        <i class="icon-social-facebook "></i><span class="nav-text">Acerca de</span>
                        </a>

</li>



                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">



                @yield('contenido')



            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('plugins/common/common.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.4.1.min')}}"></script>
    @stack('scripts')
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.css')}}"></script>

    <script src="{{asset('plugins/highlightjs/highlight.pack.min.js')}}"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script>
        (function($) {
        "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "static", //have two options, "static" and "fixed"
                headerPosition: "static", //have two options, "static" and "fixed"
                containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });


        })(jQuery);
    </script>

</body>

</html>
