<!DOCTYPE html>
<html>
<head>
	<title>Login Prueba</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   
	<!--Bootsrap 4-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Estilos-->
	<link rel="stylesheet" type="text/css" href="assets\css\login.css">
</head>
<body>
<div class="container logo-login col-10 col-sm-8 col-md-6 col-lg-4 mx-auto row">
		<div class="card">
			<div class="card-header mt-4">
				<h3>Iniciar Sesión</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form class="row g-3" method="POST">
					<div class="input-group form-group col-sm-12">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Usuario">	
					</div>
					<div class="input-group form-group col-sm-12">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Contraseña">
					</div>
					<div class="row align-items-center remember col-12">
						<input type="checkbox">Recordar sesión
					</div>
					<div class="form-group col-12">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿No Tienes Una Cuenta?
				</div>
				<div class="d-flex justify-content-center links mt-2">
					<a href="#">Que Triste</a>
				</div>
			</div>
	</div> 
</div>
</body>
</html>