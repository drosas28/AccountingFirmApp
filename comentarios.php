<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"> <!-- Boostrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons.css"> <!-- Iconos de boostrap -->
    <link rel="stylesheet" type="text/css" href="css/coments.css"> <!-- Hoja de Estilos Creada -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container-fuid bg-white fixed-top"> <!--  Navbar Inicio -->
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-5">
                <a  class= "navbar-brand ms-4 ms-lg-0 " href="index.php">
                    <h1 class="display-5 m-0"><i class="bi bi-cash-coin"></i></h1>   <!-- Nombre de empresa(sugerencias): Contadores -->
                </a>
                
            </nav>
        </div>
    </div> <!-- Navbar Final -->
    <section class="about-section section-padding" >
        <div class="container py-1" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="custom-form contact-form mb-5 mb-lg-0" id="myform" action="" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-heading">
                                            <h2><em>Deja tu comentario</em></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="name" id="name" placeholder="Tu nombre completo" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Tu correo" class="form-control" required>
                                    </div>
                                </div>
                                <input type="text" name="company" id="company" class="form-control" placeholder="Compañia" required>
                                <textarea name="mess" rows="3" class="form-control" id="mess" placeholder="Mensaje"></textarea>
                                <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control">Enviar Mensaje</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pie de pagina Inicio -->
    <footer class="container-fluid bg-dark text-light mt-5 py-5"> 
        <div class="container py-3" id="contacto">
            <div class="row g-4">
                <div class="col-lg-5 col-md-6">
                    <h4 class="text-white mb-4">Nuestra oficina</h4>
                    <p class="mb-2"><i class="bi bi-geo-alt me-3"></i>Avenida San Claudio, Blvrd 14 Sur, Cdad. Universitaria, 72592 Puebla, Pue.</p>
                    <p class="mb-2"><i class="bi bi-telephone me-3"></i>+52 2225147258</p>
                    <p class="mb-2"><i class="bi bi-envelope me-3"></i>contadores@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a href="#" class="btn btn-square btn-outline-light rounded-circle me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="btn btn-square btn-outline-light rounded-circle me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-square btn-outline-light rounded-circle me-2"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="btn btn-square btn-outline-light rounded-circle me-2"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-square btn-outline-light rounded-circle me-2"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Horas de Oficina</h4>
                    <p class="mb-1">Lunea a  Viernes</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Sabados</p>
                    <h6 class="text-light">09:00 am - 2:00 pm</h6>
                    <p class="mb-1">Domingos</p>
                    <h6 class="text-light">Cerrado</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Dejanos tus comentarios</h4>
                    <a  class= "navbar-brand ms-4 ms-lg-0 " href="comentarios.php">
                        <h1 class="display-5 m-0"><i class="bi bi-chat-square"></i></h1>   <!-- Nombre de empresa(sugerencias): Contadores -->
                    </a>
                </div>
            </div>
        </div>
    </footer> 
    <!-- Pie de pagina Fin -->
    <!-- Etiqueta Copyright Inicio-->
    <div class="container-fluid copyright py-4">  
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Contadores</a>, Todos los derechos reservados.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Diseñado por <a class="border-bottom" href="#">Equipo: (Nombre de equipo)</a>
                </div>  
            </div>
        </div>
    </div> 
    <!-- Etiqueta Copyright Fin-->


    <!-- MODAL CAMBIO EXITOSO -->
    
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Cambios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Comentario Guardado!!</h5>
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
        let submitForm = document.getElementById("myform");
        submitForm.addEventListener("submit", (e) =>{
            e.preventDefault();
            let name = $("#name").val();
            let email = $("#email").val();
            let company = $("#company").val();
            let mess = $("#mess").val();
            if (name != "" && email != "" && company != "" && mess != ""){
                let url = "http://localhost/ProyectoWeb/conexion_DB/comentarios.php?tipo=2&name=" +name+ "&email=" +email+"&company="+company+"&mess="+ mess+"&r=" + Math.random();
                $.ajax({url: url, success: function(result){
                    $("#name").val("");
                    $("#email").val("");
                    $("#company").val("");
                    $("#mess").val("");
                    $("#myModal").modal("show");                    
                }});
            }
        })

    </script>
    
</body>
</html>