<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale="1.0">
    <title>Contadores </title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css"> <!-- Boostrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons.css"> <!-- Iconos de boostrap -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Hoja de Estilos Creada -->
    <link rel="stylesheet" href="css/owl.css">
    <!-- <link rel="stylesheet" href="css/animate.css">  -->
</head>
<body>    
    <div class="container-fuid bg-white fixed-top"> <!--  Navbar Inicio -->
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-5">
                <a  class= "navbar-brand ms-4 ms-lg-0 " href="index.php">
                    <h1 class="display-5 m-0"><i class="bi bi-cash-coin"></i></h1>   <!-- Nombre de empresa(sugerencias): Contadores -->
                </a>
                <button  class="navbar-toggler me-4 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
				    <span class="navbar-toggler-icon"></span>
				</button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item"><a href="#home" class="nav-link active" aria-current="page">Home</a></li>
                        <li class="nav-item"><a href="#us" class="nav-link">Sobre Nosotros</a></li>
                        <li class="nav-item"><a href="#servicios" class="nav-link">Servicios</a></li>
                        <li class="nav-item"><a href="#agenda" class="nav-link">Agenda</a></li>
                        <li class="nav-item"><a href="#comentarios" class="nav-link">Comentarios</a></li>
                        <li class="nav-item"><a href="#contacto" class="nav-link">Contacto</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div> <!-- Navbar Final -->

    
    <header class="header" id="home"> <!-- Header Inicio -->
        <div class="container px-5">
            <div class="row">
                <div class="col-lg-8">
                    <p class="lh-1 mb-3" style="font-size: 30px">Bienvenidos</p>
                    <h1 class="display-1 mb-5">Tu estatus financiero es nuestra prioridad </h1>
                    <a href="registro.php" class="btn btn-primary py-sm-3 px-5">Inicia Sesion Cliente </a>
                    <a href="ingreso_admin.php" class="btn btn-primary py-sm-3 px-5">Inicia Sesion Administrador</a>
                </div>
            </div>
        </div>
    </header>  <!-- Header Final -->

    <!-- Quienes somos Inicio--> 
    <section class="about-section section-padding img_fondo1" >
        <div class="container py-4" id="us">
            <div class="row">
                <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                    <div class="container justify-content-center">
                        <h2 class="text-black mb-4"> ¿Quienes somos?</h2>
                        <p class="text-black mb-0"> 
                            En el despacho ---- hemos brindado un servicios de primera clase a nuestros clientes. Nosotros nos
                            encargamos de sus asuntos contables para que usted tenga la libertad de enfocarse en su vida.
                            Si usted está empezando un negocio o simplemente necesita ayuda para declarar impuestos, estamos aquí para usted.   
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="about-text-wrap">
                        <img src="img/img11.jpg" class="about-image img-fluid">
                        
                        <div class="about-text-info d-flex">
                            <div class="d-flex"> 
                                <i class="about-text-icon bi bi-coin"></i>
                            </div>
                            <div class="ms-4">
                                    <h3>Nuestro equipo</h3>
                                    <p class="mb-0 justify-content-lg-center" style="font-size: 15px;">A través del conocimiento de nuestro personal, construimos un equipo humano diverso, motivado 
                                    y profesional, centrado en dar respuesta a las necesidades de nuestros clientes</p>
                            </div>
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Quienes somos Fin--> 


    <!-- Carousel Servicios Ofrecidos INICIO -->
   <div class="projects section container-xxl py-5" id="servicios">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2><span>Servicios Ofrecidos</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-features owl-carousel">

                        <div class="item">
                            <img src="img/img1.jpg" alt="">
                            <div class="down-content">
                                <h4>Manejo de libro Contable</h4>
                                <a href="descripcion.php"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/img2.png" alt="">
                            <div class="down-content">
                                <h4>Gestion de Facturas</h4>
                                <a href="descripcion.php"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/img3.png" alt="">
                            <div class="down-content">
                                <h4>Procesamiento de nomina</h4>
                                <a href="descripcion.php"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/img4.jpeg" alt="">
                            <div class="down-content">
                                <h4>Auditoria e impuestos</h4>
                                <a href="descripcion.php"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/img5.jpg" alt="">
                            <div class="down-content">
                                <h4>Estados financieros</h4>
                                <a href="descripcion.php"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/img6.jpeg" alt="">
                            <div class="down-content">
                                <h4>Servicios de Tesorería</h4>
                                <a href="descripcion.php"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <!-- Carousel Servicios Ofrecidos FIN -->

    <!-- AGENDA INICIO-->
    <div class="container" >
        <div class="row">
            <div class="text-center">
                <h1><span>Agenda</span></h1>
            </div>
        </div>
        <div class="contenedor_calendario" id="agenda">
            <div class="row">
                <div class="py-5 col-12">
                    <div id='calendar'></div>
                </div>
                <div class="col-12">
                    <div>
                        describir el caledandario
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agenda FIN --> 



    <!-- Carousel de comentarios Inicio--> 
    <div class="container-xxl py-5" id="comentarios">
        <div class="container">
            <div class="text-center mx-auto">
                <h1 class="display-6 mb-5">Comentarios de nuestros Clientes</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-5">
                    <p class="mb-4">Nos preocupamos por nuestros clientes y nos tomamos el tiempo para desarrollar una relación con cada uno.</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <img src="img/p2.png" class="img-fluid rounded mb-3" alt="">
                            <p class="fs-5">Satisfacción garantizada,vale cada peso invertido, proyecciones reportes, asesoría = soluciones;
                                            seguimientos de principio a fin, confianza y claridad. Todo gracias a un gran equipo de
                                            trabajo y excelente dirección, sin duda una de las mejores decisiones para mi negoció</p>
                            <h4> Cliente 1</h4>
                            <span>Profesión</span>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/p2.png" class="img-fluid rounded mb-3" alt="">
                            <p class="fs-5">Excelente servicio, desde el primer contacto son atentos y le dan
                                            seguimiento continuo. Súper recomendable.&nbsp;</p>
                            <h4> Cliente 2</h4>
                            <span>Profesión 2</span>
                        </div>


                        <div class="testimonial-item">
                            <img src="img/p2.png" class="img-fluid rounded mb-3" alt="">
                            <p class="fs-5">Un gran despacho. Sin duda, mi mejor experiencia con soluciones de contabilidad. Su inteligencia de negocios
                                            nos ha ayudado a perfeccionar nuestras labores administrativas y nos han ayudado a
                                            encontrar mejores oportunidades. Valoro mucho su trabajo muchachos. Mil gracias y
                                            que alcancen el éxito que se merecen, ya van hacia allá! </p>
                            <h4> Cliente 3</h4>
                            <span>Profesión 3</span>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/p2.png" class="img-fluid rounded mb-3" alt="">
                            <p class="fs-5">Satisfacción garantizada,vale cada peso invertido,sin duda una de las mejores decisiones para mi negoció</p>
                            <h4> Cliente 4</h4>
                            <span>Profesión 5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel de comentarios Fin--> 



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

   
    <script src="css/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/custom.js"></script>
    
    <script>
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            items: 1,
            dots: false,
            loop: true,
            nav: true,
            navText : [
                '<i class="bi bi-chevron-left"></i>',
                '<i class="bi bi-chevron-right"></i>'
            ]
        });
    </script>
    
    
    
    <script src="lib/fullcalendar-6.1.4/dist/index.global.min.js"></script> <!-- Script de calendario-->
    <script src="js/calendar/main.js"></script>
    <script src="js/calendar/es.js"></script>
    <script> /*calendario */

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: '2023-04-01',
            navLinks: true,
            editable: true,
            selectable: true,
            initialView: 'dayGridMonth',
            slotMinTime : "09:00:00", //Hora de 
            slotMaxTime : "20:00:00",
            headerToolbar: { //seccion de encabezado
		        left: 'prev,next today', 
		        center: 'title',
		        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth' //,listMonth
		    },
            views: {
                dayGridMonth:{
                    titleFormat:{
                        year: 'numeric',
                        month: 'long',
                    }  
                },
                timeGridWeek:{
                    hiddenDays: [0],  
                },
                timeGridDay:{
                    hiddenDays: [0], 
                }
            },
            slotLabelFormat:{
                hour: 'numeric',
                minute: '2-digit',
                meridiem: false,
                hour12: true,
            },
            events: {
                url: 'http://localhost/ProyectoWeb/conexion_DB/agenda.php?tipo=7',
                color: '#DBBFE7',
            },
            eventTimeFormat:{
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false,
                hour12: true
            },
            
        });
        calendar.setOption('locale', 'es'); //calendario en español
        calendar.render();
      });

    </script>

   
</body>
</html>