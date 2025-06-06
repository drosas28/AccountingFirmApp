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
    <link rel="stylesheet" href="css/all.min.css">
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
                    <a href="inicioAdmin.php" class="nav-item nav-link"><i class="bi bi-house me-2"></i>Inicio</a> <!-- active -->
                    <a href="administrador.php" class="nav-item nav-link"><i class="bi bi-calendar-check me-2"></i>Clientes</a>
                    <a href="calendarioAdmin.php" class="nav-item nav-link active"><i class="bi bi-calendar-plus me-2"></i>Citas</a>
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
                                <h6 class="mb-0">Calendario</h6>
                            </div>

                            <div class="container">  <!--Calendario Inicio -->
                                <div class="row">
                                <div id="calendar"></div>
                                </div>
                            </div>   <!--Calendario Tabla Fin -->
                            
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

    <!--Modal Info (Mostrar Cita) -->
    <div class="modal fade bd-example-modal-lg" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" >
            <div class="modal-content">
                <div class="modal-header" id="modalCrearLabel"> <!-- Titulo  Modal --> 
                    <h5 class="modal-title">Información Cita</h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <div class="modal-body"> <!--Cuerpo Modal -->
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label" >ID cita: </label>
                        <div class="col-md-3">
                            <input type="text" id="txtCita" name="txtCita" class="form-control" disabled>
                        </div>
                        <label class="col-md-3 mb-3 col-form-label">ID cliente:</label>
                        <div class="col-md-3">
                            <input type="text" id="txtCliente" name="txtCliente" class="form-control" disabled >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" >Titulo: </label>
                        <div class="col-sm-10">
                            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" disabled>
                        </div>
                    </div>

                    <label class="col-sm-2 form-label" >Fecha</label><br>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" >Inicio</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio"  min="2023-01-01" max="2023-09-01" disabled>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" type="time" id="hora_inicio" name="hora_inicio" min="9:00" max="19:00" disabled>
                        </div>
                    </div>
                        
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" >Fin</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="date" name="fecha_fin" id="fecha_fin"  min="2023-01-01" max="2023-09-01" disabled>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" type="time" id="hora_fin" name="hora_fin" value="09:00" min="9:00:" max="19:00" disabled>
                        </div>
                    </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Descripción:</label>
                            <div class="col-sm-9">
                                <textarea type="text" id="txtDes" name="txtDes" class="form-control" rows="2" cols="5" disabled> </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Lugar:</label>
                            <div class="col-sm-9">
                                <textarea type="text" id="txtLugar" name="txtLugar" class="form-control" rows="1" cols="5" disabled> </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Costo:</label>
                            <div class="col-sm-4 form-group">
                                <div class="input-group ">
                                    <span class="input-group-text">$</span>
                                    <input type="number" id="txtCosto" name="txtCosto" class="form-control" >
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label">Estado:</label>
                            <div class="col-sm-4">
                                <div id="txtEstado"></div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" onclick="modificarEstado()">Cambiar estado</button>
                        <button type="button" class="btn btn-success" onclick="modificarCosto()">Modificar Precio</button>
                        <button type="button" class="btn btn-danger" onclick="eliminarCita()">Eliminar Cita</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                    </div>
            </div>
        </div>
    </div>

    <!-- MODAL Cambiar Estado-->
    <div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Modificar Estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <select class="form-select" id="txtCambio" name="txtCambio">
                            <option value="Activa">Activa</option>
                            <option value="Completada">Completada</option>
                            <option value="Reprogramar">Reprogramar</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Perdida">Perdida</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="cambio()">Cambiar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL Alerts-->
    <div class="modal fade" id="modalAlert" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="mensaje"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="css/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.min.js"></script>
    <script src='lib/fullcalendar-6.1.4/dist/index.global.min.js'></script> <!-- Script de calendario-->
    <script src='js/calendar/main.js'></script>
    <script src='js/calendar/es.js'></script>
    <script src="js/micalendarAdmin.js"></script>

    <script>
        // Sidebar Toggler
        $('.sidebar-toggler').click(function () {
            $('.sidebar, .content').toggleClass("open");
            return false;
        });

        
        
    </script>
</body>
</html>