<?php 

 namespace ReporteCita\Content\component;

 class initComponent{


 	public function navInicioAdmin(){

 		$inicio = ($_GET['url'] === "inicio" && empty($_GET["type"]))? "activo" : "";

 		if (isset($_GET["type"])) {
 			
 			$personal = ($_GET["url"] === 'dashboard' && $_GET["type"] === 'personal')? "activo" : "";
 			$clientes = ($_GET["url"] === 'dashboard' && $_GET["type"] === 'clientes')? "activo" : "";
 			$eventos = ($_GET["url"] === 'dashboard' && $_GET["type"] === 'eventos')? "activo" : "";
 			$ventas = ($_GET["url"] === 'dashboard' && $_GET["type"] === 'ventas')? "activo" : "";
 			$cita = ($_GET["url"] === 'cita' && $_GET["type"] === 'consultar')? "activo" : "";
 		
 		} else {

 			$personal = "";
 			$clientes = "";
 			$eventos = "";
 			$ventas = "";
 			$cita = "";
 		}

 		$desplegable = '<!-- MENU DESPEGABLE -->

				<input type="checkbox" id="btn-menu">
				<div class="container-menu" id="adminMenu">
					<div class="cont-menu">
						<nav>
							<div class="linkMenuDes">
								<div class="d-flex justify-content-center align-items-center mx-auto mb-2">
									<img class="img-fluid rounded-circle imgUser" src="assets/img/usuario.jpg" >
								</div>
								<span class="bg-danger p-2 d-flex align-items-center justify-content-center mx-auto rounded">
									Admin
								</span>
							</div>
							<a href="?url=inicio" class="linkMenuDes'.$inicio.'"><i class="icon fa-solid fa-globe"></i> Página Principal </a>
							<a href="?url=dashboard&type=personal" class="linkMenuDes '.$personal.'"><i class="icon fa-solid fa-users-gear"></i> Gestionar Personal </a>
							<a href="?url=dashboard&type=clientes" class="linkMenuDes '.$clientes.'"><i class="icon fa-solid fa-user-tag"></i> Consultar Clientes </a>
							<a href="?url=cita&type=consultar" class="linkMenuDes '.$cita.'"><i class="icon fa-solid fa-calendar-check"></i> Gestionar Citas </a>
							<a href="?url=dashboard&type=eventos" class="linkMenuDes '.$eventos.'"><i class="icon fas fa-film"></i> Gestionar Eventos </a>
							<a href="?url=dashboard&type=ventas" class="linkMenuDes '.$ventas.'"><i class="icon fa-solid fa-circle-dollar-to-slot"></i> Gestionar Ventas </a>
						</nav>
						<label for="btn-menu" class="fas fa-xmark"></label>
					</div>
				</div>';

 		echo ('<!-- NAVBAR SESIÓN INICIADA Administrador--> 

		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<div class="btn-menu">
					<label for="btn-menu" class="burger fas fa-bars"></label><span class="logo"> <span>Fundación Teatro Juares</span>
				</div>
				<div class="collapse navbar-collapse justify-content-end">
					<ul class="navbar-nav">
						<li class="nav-item dropdown me-2">
							<a class="nav-link dropdown-toggle menuUser mx-4 my-2" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bell"></i></a>
							<ul class="dropdown-menu dropdown-menu-end menuNoti" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#!">¡Se ha realizado una reservación!</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#!">¡Se ha realizado una compra con el comprobante 000001!</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img class="img-fluid rounded-circle fotoUser" src="assets/img/usuario.jpg">
								Administrador Tal
							</a>
							<ul class="dropdown-menu mt-0">
								<li><a class="dropdown-item" href="#">Ver perfil <i class="iconMenuUser fa-solid fa-user"></i></a></li>
								<li><a class="dropdown-item" href="#">Editar Perfil <i class="iconMenuUser fa-solid fa-user-gear"></i></a></li>
								<li><a class="dropdown-item" href="?url=dashboard">Panel de Control <i class="iconMenuUser fa-solid fa-gears"></i></a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="?url=inicio">Cerrar sesión<i class="iconMenuUser fa-solid fa-door-open"></i> </a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>'.$desplegable);
 	
 	}

 	public function footer(){

 		echo ('	<!-- FOOTER -->
		
	<footer class="footer" id="footer">
		<div class="container-md pt-3">
			<div class="row">
				<div class="col-md">
					<h5 class="card-title title-footer text-center">MENÚ PRINCIPAL</h5>
					<hr class="hr-footer">
					<ul class="nav-footer">
						<li class="footer-item mb-3"><a class="footer-links" href="?url=inicio">Inicio</a></li>
						<li class="footer-item mb-3"><a class="footer-links" href="?url=cartelera&type=mostrar">Cartelera</a></li>
						<li class="footer-item mb-3"><a class="footer-links" href="?url=cita">Citas</a></li>
						<li class="footer-item mb-3"><a class="footer-links" href="?url=inicio&type=trastelon">Trastelón</a></li>
						<li class="footer-item mb-3"><a class="footer-links" href="?url=inicio&type=ayuda">Ayuda</a></li>
					</ul>
				</div>
				<div class="col-md">	
					<h5 class="card-title title-footer text-center">CONTACTO</h5>
					<hr class="hr-footer">
						<li class="text-footer mb-4"><i class="fas fa-location-dot"></i> Ubicación: <span>Carrera 19 esquina de la calle 25</span></li>
						<li class="text-footer mb-4"><i class="fas fa-phone-flip"></i> Teléfono: </lispan>0251-2329549</li></li>
						<li class="text-footer mb-4"><i class="fas fa-envelope"></i> Correo: <span>
						teatrojuaresmedios@gmail.com</span></li>
						<li class="text-footer mb-4"><i class="fas fa-clock"></i> Horario: <span>9AM-12PM / 1PM-4PM </span></li>

				</div>
				<div class="col-md">
					<h5 class="card-title title-footer text-center">SIGUENOS</h5>
					<hr class="hr-footer">
					<div class="redes-sociales">
						<ul>
							<li><a class="text-footer" target="_black" href="https://www.facebook.com/teatrojuaresVenezuela/"><i class="icons-footer facebook fab fa-facebook-f mb-2"></i></a><span class="text-redes ms-3"> @TeatroJuares</span></li>

							<li><a class="text-footer" target="_black" href="https://twitter.com/juares_teatro?lang=es"><i class="icons-footer twitter fab fa-twitter mb-2" ></i></a><span href="#" class="text-redes ms-3"> @juares_teatro</span></li>

							<li><a class="text-footer" target="_black" href="https://www.instagram.com/teatrojuares/?hl=es"><i class="icons-footer instagram fab fa-instagram mb-2"></i></a><span href="#" class="text-redes ms-3"> @teatrojuares</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="copyright mt-3 text-center">
			<small>Fundación Teatro Juares y la Universidad Politécnica Territorial "Andres Eloy Blanco" &copy; todos los derechos reservados 2022
		</div>

	</footer>

		<!-- Link JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<!-- Owl Carousel -->
		<script src="assets/owlcarrusel/js/jquery.min.js"></script>
		<script src="assets/owlcarrusel/js/owl.carousel.min.js"></script>
		<!-- Js Bootstrap -->
		<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Sweet Alert -->
		<script type="text/javascript" src="assets/swalPackage/dist/sweetalert2.js"></script>
		<script type="text/javascript" src="assets/swalPackage/dist/sweetalert2.all.min.js"></script>
		<script type="text/javascript" src="assets/swalPackage/dist/sweetalert2.min.js"></script>
		<!-- Animation on Scroll -->
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
		  AOS.init({
		  duration: 600 
		  });
		</script>
		<!-- Pantalla de Carga -->
		<script src="assets/js/pantalla_carga.js"></script>');

 	}


 	public function linksFooter(){

 		echo ('<!-- Link JQuery -->
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
						<!-- Owl Carousel -->
						<script src="assets/owlcarrusel/js/jquery.min.js"></script>
						<script src="assets/owlcarrusel/js/owl.carousel.min.js"></script>
						<!-- Js Bootstrap -->
						<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
						<script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.js"></script>
						<!-- Sweet Alert -->
						<script type="text/javascript" src="assets/swalPackage/dist/sweetalert2.js"></script>
						<script type="text/javascript" src="assets/swalPackage/dist/sweetalert2.all.min.js"></script>
						<script type="text/javascript" src="assets/swalPackage/dist/sweetalert2.min.js"></script>
						<!-- Animation on Scroll -->
						<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
						<script>
						  AOS.init({
						  duration: 600 
						  });
						</script>
						<!-- Pantalla de Carga -->
						<script src="assets/js/pantalla_carga.js"></script>');
 	}


 }


 ?>