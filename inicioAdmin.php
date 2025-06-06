<?php 
    include("validar_sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"> <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> <!-- Iconos de boostrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="css/all.min.css"> -->
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Inicio -->
        <div class="sidebar pe-4 pb-3" style="background:  #f8ede1 !important;">
            <nav class="navbar bg-light2 navbar-light">
                <a href="usuario.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="bi bi-cash-coin me-2"></i>Contadores</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/admin/<?php echo $id?>.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <span>Administrador</span>
                        <?php  echo "<h6 class=mb-0> $nombre</h6>"?> 
                        <!-- <?php  echo "<h6 class=mb-0>ID usuario: $id </h6>"?> -->
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="inicioAdmin.php" class="nav-item nav-link active"><i class="bi bi-house me-2"></i>Inicio</a> <!-- active -->
                    <a href="administrador.php" class="nav-item nav-link"><i class="bi bi-calendar-check me-2"></i>Clientes</a>
                    <a href="calendarioAdmin.php" class="nav-item nav-link"><i class="bi bi-calendar-plus me-2"></i>Citas</a>
                    <a href="miCuentaAdmin.php" class="nav-item nav-link"><i class="bi bi-person-bounding-box me-2"></i>Cuenta</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar Fin -->
        <!-- Contenido Inicio --> 
        <div class="content">
            <nav class="navbar navbar-expand bg-light2 navbar-light sticky-top px-4 py-0"> <!-- Navbar Inicio --> 
                <a href="" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="bi bi-cash-coin"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="bi bi-list"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input type="search" class="form-control border-0" placeholder="Buscar">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/admin/<?php echo $id?>.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php  echo $nombre?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            
                            <a href="logout.php" class="dropdown-item">Cerrar Sesion </a>
                        </div>
                    </div>
                </div>
            </nav><!-- Navbar Fin--> 

            <!-- Clientes Inicio -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="h-100 bg-light2 rounded p-4">
                            <div class="d-felx align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Inicio</h6>
                            </div>

                            <div class="container">  
                                <div class="row">
                                    <h5>Comentarios Clientes</h5>
                                    <div id="comentarios" class="row"></div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <!-- Clientes Fin -->

            <!-- Pie de pagina Inicio --> 
            <footer class="container-fluid pt-4 px-4">
                <div class="bg-light2 rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a class="border-bottom" href="#">Contadores</a>, Todos los derechos reservados.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Diseñado por <a class="border-bottom" href="#">Equipo: (Nombre de equipo)</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Pie de pagina Fin --> 

        </div><!-- Contenido Fin; navbar fin -->
    </div>

    <script src="css/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.min.js"></script>

    <script>
        // Sidebar Toggler
        $('.sidebar-toggler').click(function () {
            $('.sidebar, .content').toggleClass("open");
            return false;
        });

        function putComentarios(){
            let url = "http://localhost/ProyectoWeb/conexion_DB/comentarios.php?tipo=1";
            $.ajax({url:url,success:function(result){
                let com = "";
                for (let i = 0; i< result.items.length;i++){
                    com+='<div class="col-xl-6 col-md-6 mb-3 mt-lg-0">';
                    com+=   '<div class="pricing-thumb">';
                    com+=       '<div class="d-flex">';
                    com+=           '<div>';
                    com+=               '<h3><small>'+result.items[i].name+'</small></h3>';
                    com+=               '<h4><small>'+result.items[i].email+'</small></h4>';
                    com+=           '</div>';
                    com+=       '</div>';
                    com+=       '<br>';
                    com+=       '<ul>';
                    com+=           '<li>'+result.items[i].mess+'</li>';
                    com+=       '</ul>';
                    com+=   '</div>';
                    com+='</div>';
                }
                $("#comentarios").html(com);
            }});
        }

        $(document).ready(function(){
            putComentarios();
        });
        
    </script>
</body>
</html>