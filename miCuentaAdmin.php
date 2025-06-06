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
                    <a href="inicioAdmin.php" class="nav-item nav-link"><i class="bi bi-house me-2"></i>Inicio</a> <!-- active -->
                    <a href="administrador.php" class="nav-item nav-link"><i class="bi bi-calendar-check me-2"></i>Clientes</a>
                    <a href="calendarioAdmin.php" class="nav-item nav-link"><i class="bi bi-calendar-plus me-2"></i>Citas</a>
                    <a href="miCuentaAdmin.php" class="nav-item nav-link active"><i class="bi bi-person-bounding-box me-2"></i>Cuenta</a>
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
                                <h6 class="mb-0">Detalles del perfil</h6>
                            </div>
                            <div>
                                <div id="formulario"></div>
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
    <!-- MODAL CAMBIO EXITOSO -->
    
    <div class="modal fade" id="modalCambio" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Cambios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Cambios Guardados!!</h5>
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

    <script>
        // Sidebar Toggler
        $('.sidebar-toggler').click(function () {
            $('.sidebar, .content').toggleClass("open");
            return false;
        });

        let id = <?php echo $id?>;
        function datosFormulario (id){
            let url = "http://localhost/ProyectoWeb/conexion_DB/administrador.php?tipo=1&id=" + id;
            $.ajax({url:url,success:function(result){
                let miform = "";
                miform+='<div class="card mb-4">';
                miform+='   <div class="card-body">';
                miform+='           <div class="row">';
                miform+='               <div class="mb-3 col-md-3">';
                miform+='                   <label for="Nombre" class="form-label">Nombre</label>';
                miform+='                   <input class="form-control" type="text" id="nombre" name="nombre" value="'+result.item[0].nom + '">';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-3">';
                miform+='                   <label for="apellido_p" class="form-label">Apellido Paterno</label>';
                miform+='                   <input class="form-control" type="text" name="apellido_p" id="apellido_p" value="'+result.item[0].ap+'"/>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-3">';
                miform+='                   <label for="apellido_m" class="form-label">Apellido Materno</label>';
                miform+='                   <input class="form-control" type="text" name="apellido_m" id="apellido_m" value="'+result.item[0].am+'"/>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-3">';
                miform+='                   <label for="usuario" class="form-label">Nombre de usuario</label>';
                miform+='                   <input class="form-control" type="text" id="us" name="us" value="'+result.item[0].us+'"/>';
                miform+='               </div>';
                miform+='           </div>';
                miform+='           <hr>';
                miform+='           <h5>Dirección:</h5>';
                const [calle, num, col, cp] = separarDir(result.item[0].dir);
                miform+='           <div class="row">';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label for="calle" class="form-label">Calle</label>';
                miform+='                   <input type="text" class="form-control" id="calle" name="calle" value="'+calle+'"/>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label for="numero" class="form-label">Número</label>';
                miform+='                   <input type="number" class="form-control" id="numero" name="numero" value="'+num+'"/>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label for="colonia" class="form-label">Colonia</label>';
                miform+='                   <input type="text" class="form-control" id="colonia" name="colonia" value="'+col+'"/>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label for="cp" class="form-label">Código Postal</label>';
                miform+='                   <input type="text" class="form-control" id="cp" name="cp" maxlength="6" value="'+cp+'"/>';
                miform+='               </div>';
                miform+='           </div>';
                miform+='           <hr>';
                miform+='           <div class="row">';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label for="email" class="form-label">Correo</label>';
                miform+='                   <input type="email" class="form-control" id="email" name="email"  pattern="[^ @]*@[^ @]*" value="'+result.item[0].email+'"/>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label class="form-label" for="cel">Número de Celular</label>';
                miform+='                   <div class="input-group input-group-merge">';
                miform+='                       <span class="input-group-text">MX (+52)</span>';
                miform+='                       <input type="text" id="cel" name="cel" class="form-control" value="'+result.item[0].tel+'"/>';
                miform+='                   </div>';
                miform+='               </div>';
                miform+='               <div class="mb-3 col-md-6">';
                miform+='                   <label class="form-label" for="tel_l">Número Local</label>';
                miform+='                   <div class="input-group input-group-merge">';
                miform+='                       <span class="input-group-text">MX (+52)</span>';
                miform+='                       <input type="text" id="tel_l" name="tel_l" class="form-control" value="'+result.item[0].local+'"/>';
                miform+='                   </div>';
                miform+='               </div>';
                miform+='           </div>';
                miform+='           <hr>';
                miform+='           <div class="row">';
                miform+='               <div class="mb-3 col-md-4">';
                miform+='                   <label class="form-label">Contraseña</label>';
                miform+='                   <div class="input-group input-group-merge">';
                miform+='                       <input type="password" class="form-control" id="password" name="password" value="'+result.item[0].pass+'">';
                miform+='                       <button  class="input-group-text form" type="button" onclick="mostrarPassword()"> <span class="bi bi-eye-slash" id="togglePassword"></span> </button>';
                miform+='                   </div>';
                miform+='               </div>';
                miform+='           </div>';
                miform+='           <div class="mt-2">';
                miform+='               <button type="submit" class="btn btn-success me-2" onclick="modificar()">Guardar</button>';
                miform+='           </div>';
               
                miform+='   </div>';
                miform+='</div>';
                $("#formulario").html(miform);
            }});
        }

        $(document).ready(function(){
			datosFormulario(id);
		});

        function modificar(){
            //console.log(id);
            let nom = $("#nombre").val();
            let ap = $("#apellido_p").val();
            let am = $("#apellido_m").val();
            let us = $("#us").val();
            let c = $("#calle").val();
            let num = $("#numero").val();
            let col = $("#colonia").val();
            let cp =$("#cp").val();
            let dir = `${c},${num},${col},${cp}`;
            let email = $("#email").val();
            let tel = $("#cel").val();
            let local= $("#tel_l").val();
            let pass = $("#password").val();
            if (nom != "" && ap != "" && am != "" && us != "" && dir != "" && email != "" && tel != "" && tel_l != "" && pass != ""){
                let url = "http://localhost/ProyectoWeb/conexion_DB/administrador.php?tipo=2&id=" +id + "&nom=" +nom+ "&ap=" +ap+ "&am=" +am+ "&us=" +us+ "&dir=" +dir+ "&email=" +email+ "&tel=" +tel+ "&local=" +local+ "&pass="+ pass+"&r=" + Math.random(); 
                $.ajax({url: url, success: function(result){
                    $("#modalCambio").modal("show");
                }});
            }
        }

        function mostrarPassword(){
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
        }

        function separarDir(dir){
	        let nuevadir= dir.split(",");
            return nuevadir;
        }

        
    </script>
</body>
</html>