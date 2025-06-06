<?php 
    include("validar_sesion.php");
?>
<!DOCTYPE html> <!--PAGINA DE CITAS US --> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
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
                    <a href="usuario.php" class=" nav-link "><i class="bi bi-house me-2"></i>Inicio</a> <!-- active -->
                    <a href="mis_citasUS.php" class="nav-link active"><i class="bi bi-calendar-check me-2"></i>Mis citas</a>
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

            <div>
                <div class="container-fluid pt-4 px-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="h-100 bg-light1 rounded p-4">
                                <div class="d-felx align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Mis Citas</h6>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <div id="tablaCitas"></div>
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
            </div>


        </div><!-- Contenido Fin; navbar fin -->  

    </div>

    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            
            <div class="modal-body">
                Eliminado con exito!!, te recomendamos volver agendar tu cita pronto 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <script src="css/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.min.js"></script>

    <script>
        // Sidebar Toggler
        $('.sidebar-toggler').click(function () {
            $('.sidebar, .content').toggleClass("open");
            return false;
        });

        function loadUS(){
            let id = <?php echo $id?>;
            let url ="http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=6&id="+ id;
            //console.log(url);
            $.ajax({url:url,success:function(result){
                if (result.mensaje === "No hay elementos"){
                    const mensaje = '<h1>No hay citas Agendadas</h1>';
                    $("#tablaCitas").html(mensaje);
                }else{
                    let tableUs = "";
                    tableUs+='<table class="clientes-table table table-light">';
                    tableUs+='   <thead>';
                    tableUs+='       <tr>';
                    tableUs+='           <th scope="col">Id cita</th>';
                    tableUs+='           <th scope="col">Título</th>';
                    tableUs+='           <th scope="col">Descripción</th>';
                    tableUs+='           <th scope="col">Costo</th>';
                    tableUs+='           <th scope="col">Lugar/Horario</th>';
                    tableUs+='           <th scope="col">Acción</th>';
                    tableUs+='       </tr>';
                    tableUs+='   </thead>';
                    tableUs+='   <tbody>';
                    for (let i = 0; i< result.items.length;i++){
                        tableUs+='   <tr>';
                        tableUs+='       <th>' + result.items[i].id_cita + '</th>';
                        tableUs+='       <td class="mb-2"><strong>'+result.items[i].titulo+'</strong></td>'; 
                        tableUs+='       <td class="mb-2">'+result.items[i].descripcion+'</td>';
                        tableUs+='       <td style="background-color: #FBE499;" class="mb-2"> $'+result.items[i].costo+'</td>'; 
                        tableUs+='       <td>';
                        tableUs+='           <p class="mb-2"> Inicio: ' +result.items[i].start+ ' -- Fin:'+result.items[i].end+ ' </p>';
                        tableUs+='           <p class="mb-2">Lugar: ' +result.items[i].lugar+ '</p>';
                        tableUs+='       </td>';
                        if (result.items[i].estatus != "Completada"){
                            tableUs+='       <td>';
                            tableUs+='           <span class="badge me-1 bg-label-'+ estatus(result.items[i].estatus)+ '">' +result.items[i].estatus + '</span>';
                            tableUs+='           <div class="dropdown">';
                            tableUs+='               <button type="button" class="btn p-0 dropdown-toggle" data-bs-toggle="dropdown"></button>';
                            tableUs+='               <div class="dropdown-menu">';
                            tableUs+='                   <button type="button" class="btn btn-danger" onclick="eliminar_cita('+result.items[i].id_cita +')"><i class="bi bi-x-circle me-1"></i>Cancelar cita</button>';
                            tableUs+='               </div>';
                            tableUs+='           </div>';
                            tableUs+='       </td>';
                            tableUs+='   </tr>';
                        }else{
                            tableUs+='       <td class="mb-2"> <span class="badge me-1 bg-label-success"> COMPLETADA </td>';
                            tableUs+='   </tr>';
                        }
                    }
                    tableUs+='   </tbody>';
                    tableUs+='</table>';

                    $("#tablaCitas").html(tableUs);
                }
            }});
        }

        function eliminar_cita(id_cita){
            let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=3&id_cita=" +id_cita+ "&r=" + Math.random();
            $.ajax({url: url, success: function(result){
                loadUS();
                $("#eliminarModal").modal("show");
            }});
        }

        function estatus(status){
            let estado = "";
            if (status === "Activa"){
                estado = "primary";
            }else if (status === "Reprogramar"){
                estado = "info";
            }else if(status === "Pendiente"){
                estado = "warning";
            }else if (status === "Perdida"){
                estado = "light";
            }
            return estado;
        }


        $(document).ready(function(){
            loadUS();
        });

    </script>    
    
</body>
</html>