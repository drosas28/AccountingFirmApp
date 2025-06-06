<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Administrador</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"> <!-- Boostrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons.css"> <!-- Iconos de boostrap -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Hoja de Estilos Creada -->
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="contact-section section-padding quote my-5 py-5 justify-content-center">
        <div class="container">
            <div class="row">  
                <div class="col-lg-7 col-7 mx-auto text-center">
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
                    <div class="justify-content-center mt-5 col-lg-7 mx-auto" id="nav-Ingreso" role="tabpanel" aria-labelledby="nav-Ingreso-tab">
                        <form action="validar_admin.php" method="post" accept-charset="utf-8" class="custom-form contact-form " role="form">
                            <div class="mb-3 ">
                                <div class="form-floating ">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Correo Electronico" name="usAdmin" required>
                                    <label class="form-label">Usuario</label>                                
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <div class="form-floating ">
                                        <input type="password" class="form-control bg-light" placeholder="Contraseña" name="passAdmin" id="passAdmin" required>
                                        <label class="form-label">Contraseña</label>
                                    </div>
                                    <button class="input-group-text"  type="button" onclick="mostrarPasswordLoginAdmin()"> <span class="bi bi-eye-slash" id="togglePasswordA"></span> </button>
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
    <script src="css/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery/jquery.min.js"></script>

    <script> 
        function mostrarPasswordLoginAdmin(){
            const togglePassword = document.querySelector('#togglePasswordA');
            const password = document.querySelector('#passAdmin');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
        }
    </script>

</body>
</html>