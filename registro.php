<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"> <!-- Boostrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons.css"> <!-- Iconos de boostrap -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Hoja de Estilos Creada -->
    <link rel="stylesheet" href="css/style1.css">
</head>
<body> 


    <div class="contact-section section-padding quote my-5 py-5">
        <div class="container">
            <div class="row">   
                <div class="col-lg-12 col-12 mx-auto text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="display-5 m-0"><i class="bi bi-cash-coin"></i></h1>
                            </div>
                            <div class="col">   
                                <a class="btn btn-danger py-3 px-4" href="index.php">Salir</a>
                            </div>
                        </div>
                    </div>   
                    <br>
                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-RegisForm-tab" data-bs-toggle="tab" data-bs-target="#nav-RegisForm" aria-controls="nav-RegisForm" aria-selected="false">
                                <h5>Registro</h5>
                            </button>

                            <button class="nav-link" id="nav-Ingreso-tab" data-bs-toggle="tab" data-bs-target="#nav-Ingreso" type="button" role="tab" aria-controls="nav-Ingreso" aria-selected="false">
                                <h5>Ingresar</h5>
                            </button>
                        </div>
                    </nav>

                    <div class="tab-content shadow-lg mt-5 justify-content-center col-lg-7 mx-auto" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-RegisForm" role="tabpanel" aria-labelledby="nav-RegisForm-tab">
                            <form action="" id="regisForm">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Nombre" id="nom" required >
                                        <label class="form-label">Nombre</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Apellido Paterno" id="ap" required>
                                        <label class="form-label">Apellido Paterno</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Apellido Materno" id="am" required>
                                        <label class="form-label">Apellido Materno</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Alias" id="us" required>
                                        <label class="form-label">Usuario</label>
                                    </div>
                                </div>
                                <hr>
                                <h5>Dirección:</h5>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Calle" id="calle" name="calle" required/>
                                        <label  class="form-label">Calle</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-light border-0" placeholder="Número" id="numero" name="numero" required />
                                        <label for="numero" class="form-label">Número</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Colonia" id="colonia" name="colonia" required />
                                        <label for="colonia" class="form-label">Colonia</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Código Postal" id="cp" name="cp" maxlength="6" required />
                                        <label for="cp" class="form-label">Código Postal</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light border-0" placeholder="Correo Electronico" id="email" pattern="[^ @]*@[^ @]*" required>
                                        <label class="form-label">Correo Electronico</label>
                                        
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group ">
                                        <span class="input-group-text">MX (+52)</span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-light border-0" placeholder="Numero de celular" id="tel" required>
                                            <label class="form-label">Numero de celular</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group ">
                                        <span class="input-group-text">MX (+52)</span>
                                        <div class="form-floating ">
                                            <input type="text" class="form-control bg-light border-0" placeholder="Telefono local" id="tel_l" required>
                                            <label class="form-label">Telefono local</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating">
                                            <input type="password" class="form-control bg-light border-0" placeholder="Contraseña" id="pass1" name="pass1" required>
                                            <label class="form-label">Contraseña</label>
                                        </div>
                                        <button  class="input-group-text form" type="button" onclick="mostrarPassword()"> <span class="bi bi-eye-slash" id="togglePassword"></span> </button>
                                    </div>

                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success py-3 px-4" >Registrar</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade justify-content-center mt-5 col-lg-7 mx-auto" id="nav-Ingreso" role="tabpanel" aria-labelledby="nav-Ingreso-tab">
                            <form action="validar_us.php" method="post" accept-charset="utf-8" class="custom-form contact-form " role="form">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Correo Electronico" name="usIngresar" required >
                                        <label class="form-label">Usuario</label>                                
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating">
                                            <input type="password" class="form-control bg-light border-0" placeholder="Contraseña" name="passIngresar" id="passIngresar" required>
                                            <label class="form-label">Contraseña</label>
                                        </div>
                                        <button  class="input-group-text form" type="button" onclick="mostrarPasswordLogin()"> <span class="bi bi-eye-slash" id="togglePassword1"></span> </button>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success py-3 px-4">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL EXITO-->
    
    <div class="modal fade" id="modalExito" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Solicitud de Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>REGISTRO EXITOSO!!</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="css/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery/jquery.min.js"></script>

    <script>
        let submitForm = document.getElementById("regisForm");

        submitForm.addEventListener("submit", (e) =>{
            e.preventDefault();
            let nom = $("#nom").val();
            let ap = $("#ap").val();
            let am = $("#am").val();
            let us = $("#us").val();
            let calle = $("#calle").val();
            let num = $("#numero").val();
            let col = $("#colonia").val();
            let cp = $("#cp").val();
            let dir = `${calle},${num},${col},${cp}`;
            console.log(dir);
            let email = $("#email").val();
            let tel = $("#tel").val();
            let tel_l= $("#tel_l").val();
            let pass1 = $("#pass1").val();

            if (nom != "" && ap != "" && am != "" && us != "" && dir != "" && email != "" && tel != "" && tel_l != "" && pass1 != ""){
                let url1 = "http://localhost/ProyectoWeb/conexion_DB/clientes.php?tipo=2&nom="  +nom+ "&a_p=" +ap+ "&a_m=" +am+ "&us=" +us+ "&dir=" +dir+ "&cor=" +email+ "&num_tel=" +tel+ "&num_l=" +tel_l+ "&r=" + Math.random();
                let url2 = "http://localhost/ProyectoWeb/conexion_DB/usuarios.php?tipo=2&us=" +us+ "&pass=" +pass1+ "&r=" + Math.random();
                $.ajax({url: url1, success: function(result){
                    $("#nom").val("");
                    $("#ap").val("");
                    $("#am").val("");
                    $("#us").val("");
                    $("#calle").val("");
                    $("#numero").val("");
                    $("#colonia").val("");
                    $("#cp").val("");
                    $("#email").val("");
                    $("#tel").val("");
                    $("#tel_l").val("");
                    $.ajax({url: url2, success: function(result){
                        $("#pass1").val("");
                        $("#modalExito").modal("show");
                    }});
                    
                }});
            }

        });
        
        function mostrarPassword(){
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#pass1');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
        }

        function mostrarPasswordLogin(){
            const togglePassword = document.querySelector('#togglePassword1');
            const password = document.querySelector('#passIngresar');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
        }
    </script>



</body>
</html>