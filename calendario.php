<?php 
    include("validar_sesion.php");
?>

<!DOCTYPE html> <!--PAGINA CITAS --> 
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
                    <a href="usuario.php" class=" nav-link"><i class="bi bi-house me-2"></i>Inicio</a> <!-- active -->
                    <a href="mis_citasUS.php" class="nav-link"><i class="bi bi-calendar-check me-2"></i>Mis citas</a>
                    <a href="calendario.php" class="nav-link active"><i class="bi bi-calendar-plus me-2"></i>Agendar cita</a>
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
                        <div class="col-14">
                            <div class="h-100 bg-light1 rounded p-4">
                                <div class="d-felx align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Calendario</h6>
                                </div>
                                <div id="calendar"></div>
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

    <!--Modal Info (Agendar Cita) -->
    <div class="modal fade bd-example-modal-lg" id="agendaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header" id="modalCrearLabel"> <!-- Titulo  Modal --> 
                    <h5 class="modal-title">Agendar Cita</h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="agendarCitaForm">
                    <div class="modal-body"> <!--Cuerpo Modal -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Titulo: </label>
                            <div class="col-sm-10">
                                <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" required>
                            </div>
                        </div>
                        <label class="col-sm-2 form-label" >Fecha: </label><br>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Inicio</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio"  min="2023-01-01" max="2023-09-01" value="2023-04-29" required>
                            </div>
                            <div class="col-sm-5">
                                <input class="form-control" type="time" value="09:00" id="hora_inicio" name="hora_inicio" min="9:00" max="19:00" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Fin</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="date" name="fecha_fin" id="fecha_fin"  min="2023-01-01" max="2023-09-01" required>
                            </div>
                            <div class="col-sm-5">
                                <input class="form-control" type="time" id="hora_fin" name="hora_fin" min="9:00" max="19:00" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Descripción:</label>
                            <div class="col-sm-9">
                                <textarea type="text" id="txtDes" name="txtDes" class="form-control" rows="2" cols="5" required> </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lugar:</label>
                            <div class="col-sm-10">
                                <textarea type="text" id="txtLugar" name="txtLugar" class="form-control" rows="2" cols="5" required> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success">AgendarCita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL ALERTA (Empalme de reunión) -->
    <div class="modal fade" id="modalAlerta" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Empalme de reunión, intente de nuevo!!</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL Cita agendada -->
    <div class="modal fade" id="modalAceptar" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Cita agendada Exitosamente!!</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL Horario de Oficina Sábado (9:00 am a 2:00pm) -->
    <div class="modal fade" id="modalSabado" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Escoger un horario de oficina Sábado de 9:00 am a 2:00 pm</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL Horario de Oficina Lunes a Viernes (9:00 am a 7:00pm) -->
    <div class="modal fade" id="modalSemana" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Escoger un horario de oficina de 9:00 am a 7:00 pm</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL No domingos -->
    <div class="modal fade" id="modalDomingo" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>No se permite registrar horario en Domingo, Intente de Nuevo!!</h5>
                        <h6>Horarios de Oficina: 
                            Lunes - Viernes : 9:00 am -- 7:00 pm
                            Sábado: 9:00 am -- 2:00pm
                        </h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL LLENA TODOS LOS CAMPOS -->
    <div class="modal fade" id="modalCampos" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Llena Todos los campos</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL Viernes-Sabado -->
    <div class="modal fade" id="modalVS" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Revisa el Horario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Viernes: 9:00 am a 7:00pm
                            Sábado: 9:00 am a 2:00pm
                        </h5>
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
    <script src='js/micalendar.js'></script>

    <script>
        // Sidebar Toggler
        $('.sidebar-toggler').click(function () {
            $('.sidebar, .content').toggleClass("open");
            return false;
        });
        let id = <?php echo $id?>;
        calendar(id);

        let citaForm = document.getElementById("agendarCitaForm");
        citaForm.addEventListener("submit", (e) => {
            e.preventDefault();
            let titulo = $("#txtTitulo").val();
            let f_inicio = juntar_fechas($("#fecha_inicio").val(), $("#hora_inicio").val());
            let f_fin = juntar_fechas($("#fecha_fin").val(), $("#hora_fin").val()) + ":00";
            let des = $("#txtDes").val();
            let lugar = $("#txtLugar").val();

            const nombreDelDiaSegunFecha = (fecha) => ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"][ new Date(fecha).getDay()];
        
            if (titulo != "" && $("#fecha_inicio").val() != "" && $("#hora_inicio").val() != "" && $("#fecha_fin").val() != "" && $("#hora_fin").val() != "" && des.length != 1 && lugar.length != 1){//Validación de Todos los campos llenos
                if (nombreDelDiaSegunFecha(f_inicio) != "domingo" && nombreDelDiaSegunFecha(f_fin) != "domingo"){ //validación de domingo
                    if ($("#fecha_inicio").val() == $("#fecha_fin").val()) { //validar si el del mismo dia; si es del mismo dia validar el rango de horas (Lunes a viernes)
                        if (nombreDelDiaSegunFecha(f_inicio) == "sábado" && nombreDelDiaSegunFecha(f_fin) == "sábado"){ // si es sabado, validar horas sabado
                            if ($("#hora_inicio").val() >= "09:00" && $("#hora_inicio").val() <= "14:01" && $("#hora_fin").val() >= "09:00" && $("#hora_fin").val() <= "14:01"){
                                let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=7";
                                    $.ajax({url: url,success: function (result) {
                                        let bandera = "";
                                        for (let i = 0; i < result.length; i++) {
                                            if (result[i].start == f_inicio || result[i].end == f_fin || (result[i].start > f_inicio && result[i].end < f_fin))
                                                bandera = "empalme";
                                        }
                                        if (bandera == "empalme") {
                                            $("#modalAlerta").modal("show");
                                            $("#agendaModal").modal("hide");
                                            limpiarModal();
                                        } else if (bandera == "") {
                                            let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=2&id=" + id + "&titulo=" +
                                            titulo + "&des=" + des + "&f_inicio=" + f_inicio + "&f_fin=" + f_fin + "&lugar=" + lugar + "&r=" + Math.random();
                                            $.ajax({ url: url,success: function (result) {
                                                $("#agendaModal").modal("hide");//mostrar modal de cita registrada
                                                $("#modalAceptar").modal("show");
                                                limpiarModal();
                                            }});
                                        }
                                    }});
                            } else {
                                $("#modalSabado").modal("show");
                            }
                        } else { // si no es entre semana
                            if ($("#hora_inicio").val() >= "09:00" && $("#hora_inicio").val() <= "19:00" && $("#hora_fin").val() >= "09:00" && $("#hora_fin").val() <= "19:00"){ //Validar horario entre semana;finalmente revisar si no existe empalme de
                                let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=7";
                                $.ajax({ url: url, success: function (result) {
                                    let bandera = "";
                                    for (let i = 0; i < result.length; i++) {
                                        if ( result[i].start == f_inicio || result[i].end == f_fin ||(result[i].start > f_inicio && result[i].end < f_fin))
                                            bandera = "empalme";
                                    }

                                    if (bandera == "empalme") {
                                        $("#modalAlerta").modal("show");
                                        $("#agendaModal").modal("hide");
                                        limpiarModal();
                                    } else if (bandera == "") {
                                        let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=2&id=" + id + "&titulo=" + titulo +
                                        "&des=" + des + "&f_inicio=" + f_inicio + "&f_fin=" +f_fin + "&lugar=" + lugar + "&r=" + Math.random();
                                        $.ajax({ url: url,success: function (result) {
                                            $("#agendaModal").modal("hide");
                                            $("#modalAceptar").modal("show");
                                            limpiarModal();
                                        }});
                                    }
                                }});
                            } else {
                                $("#modalSemana").modal("show");
                            }
                        }
                    } else {
                        console.log("NO mismo dia");
                        if (nombreDelDiaSegunFecha(f_inicio) == "viernes" && nombreDelDiaSegunFecha(f_fin) == "sábado"){ //validar viernes a Sabado 
                            if ($("#hora_inicio").val() <= "09:00" && $("#hora_inicio").val() <= "19:00" && $("#hora_fin").val() >= "09:00" && $("#hora_fin").val() <= "14:01"){
                                let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=2&id=" + id + "&titulo=" + titulo + "&des=" + 
                                    des + "&f_inicio=" + f_inicio + "&f_fin=" +f_fin + "&lugar=" + lugar + "&r=" + Math.random();
                                $.ajax({ url: url,success: function (result) {
                                    $("#agendaModal").modal("hide");
                                    $("#modalAceptar").modal("show");
                                    limpiarModal();
                                }});
                            }else{
                                $("#modalVS").modal("show");
                            }
                        }else{ //dias entre semana
                            if ($("#hora_inicio").val() >= "09:00" && $("#hora_inicio").val() <= "19:00" && $("#hora_fin").val() >= "09:00" && $("#hora_fin").val() <= "19:00"){ //Validación de Dias entre Semana
                                let url = "http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=2&id=" + id + "&titulo=" + titulo +
                                    "&des=" + des + "&f_inicio=" + f_inicio + "&f_fin=" +f_fin + "&lugar=" + lugar + "&r=" + Math.random();
                                $.ajax({ url: url,success: function (result) {
                                    $("#agendaModal").modal("hide");
                                    $("#modalAceptar").modal("show");
                                    limpiarModal();
                                }});
                            }else{
                                $("#modalSemana").modal("show");
                            }
                        }
                    }
                } else {
                    $("#agendaModal").modal("hide");
                    $("#modalDomingo").modal("show");
                    limpiarModal();
                }
            } else {
                $("#modalCampos").modal("show");
            }
        })

        $(document).ready(function(){
            calendar(id);
        });

    </script>    
    
</body>
</html>



		
