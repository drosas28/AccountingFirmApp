<?php 
    include("validar_sesion.php");
?>
<!DOCTYPE html> <!--PAGINA INICIO --> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"> <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> <!-- Iconos de boostrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Inicio -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light1 navbar-light">
                <a href="usuario.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="bi bi-cash-coin me-2"></i>Contadores</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/p<?php echo $id?>.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <?php  echo "<h6 class=mb-0> $nombre</h6>"?> 
                        <!-- <?php  echo "<h6 class=mb-0>ID usuario: $id </h6>"?> -->
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="usuario.php" class=" nav-link active"><i class="bi bi-house me-2"></i>Inicio</a> <!-- active -->
                    <a href="mis_citasUS.php" class="nav-link"><i class="bi bi-calendar-check me-2"></i>Mis citas</a>
                    <a href="calendario.php" class="nav-link"><i class="bi bi-calendar-plus me-2"></i>Agendar cita</a>
                    <a href="miCuentaUs.php" class=" nav-link"><i class="bi bi-person-bounding-box me-2"></i>Cuenta</a>
                </div>
                
            </nav>
        </div>
        <!-- Sidebar Fin -->

        <!-- Contenido Inicio --> 
        <div class="content">
            <nav class="navbar navbar-expand bg-light1 navbar-light sticky-top px-4 py-0"> <!-- Navbar Inicio --> 
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
                            <img class="rounded-circle me-lg-2" src="img/p<?php echo $id?>.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php  echo $nombre?> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout.php" class="dropdown-item">Cerrar Sesion </a>
                        </div>
                    </div>
                </div>
            </nav><!-- Navbar Fin--> 
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-14">
                        <div class="h-100 bg-light1 rounded p-4">
                            <div class="d-felx align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Servicios ofrecidos</h6>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 mb-4">                            
                                    <div class="card border-left-warning shadow mb-4">
                                        <a href="#collapseCard1" class="d-block card-header py-3" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard1">
                                            <h6 class="m-0 font-weight-bold text-primary">Manejo de libro Contables</h6>
                                        </a>
                                        <div class="collapse" id="collapseCard1">
                                            <div class="card-body">
                                                El servicio consiste en registrar todas las transacciones financieras de una empresa. 
                                                Considerado como parte fundamental para el debido manejo contable de una empresa. 
                                                Estas transacciones pueden incluir compras, ventas, recibos y pagos.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4"> 
                                    <div class="card border-left-primary shadow mb-4">
                                        <a href="#collapseCard2" class="d-block card-header py-3" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard2">
                                            <h6 class="m-0 font-weight-bold text-primary">Gestión de Facturas</h6>
                                        </a>
                                        <div class="collapse " id="collapseCard2">
                                            <div class="card-body">
                                                El manejo de la facturación de una compañía consiste en la emisión de facturas a clientes, seguimiento de cobros y pagos a proveedores.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4"> 
                                    <div class="card border-left-secondary shadow mb-4">
                                        <a href="#collapseCard3" class="d-block card-header py-3" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard3">
                                            <h6 class="m-0 font-weight-bold text-primary">Procesamiento de nómina</h6>
                                        </a>
                                        <div class="collapse " id="collapseCard3">
                                            <div class="card-body">
                                                Es el cálculo y procesamiento del pago de la nómina de una empresa, incluyendo aspectos como: 
                                                Salario base, pensiones, seguro de salud, seguro de empleo, impuestos y otros beneficios relacionados con la nómina.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xl-4 col-md-6 mb-4">                            
                                    <div class="card border-left-success shadow mb-4">
                                        <a href="#collapseCard4" class="d-block card-header py-3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCard4">
                                            <h6 class="m-0 font-weight-bold text-primary">Auditoría e impuestos</h6>
                                        </a>
                                        <div class="collapse" id="collapseCard4">
                                            <div class="card-body">
                                                La auditoría es el proceso de revisión y análisis a detalle de los movimientos financieros de una empresa. 
                                                Por otro lado, la declaración de impuestos es el cálculo, preparación y presentación de impuestos ante las autoridades fiscales correspondientes 
                                                con el objetivo de cumplir a conformidad con las leyes y regulaciones locales.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4"> 
                                    <div class="card border-left-info shadow mb-4">
                                        <a href="#collapseCard5" class="d-block card-header py-3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCard5">
                                            <h6 class="m-0 font-weight-bold text-primary">Estados Financieros</h6>
                                        </a>
                                        <div class="collapse" id="collapseCard5">
                                            <div class="card-body">
                                            Los estados financieros son el resumen de las actividades comerciales y desempeño financiero de una empresa. 
                                            Estos pueden incluir el estado de flujo de efectivo, balance general y/o estado de pérdidas y ganancias
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4"> 
                                    <div class="card border-left-danger shadow mb-4">
                                        <a href="#collapseCard6" class="d-block card-header py-3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCard6">
                                            <h6 class="m-0 font-weight-bold text-primary">Servicios de Tesorería</h6>
                                        </a>
                                        <div class="collapse" id="collapseCard6">
                                            <div class="card-body">
                                                Este servicio consiste en la preparación y emisión de pagos en nombre de una compañía, incluyendo pagos a proveedores y 
                                                otros servicios derivados de su operación comercial. 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>    
            <footer class="container-fluid pt-4 px-4">
                <div class="bg-light1 rounded-top p-4">
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
    </script>    
    
</body>
</html>