<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow,noodp">
	<meta name="googlebot" content="index,follow">
	<meta name="category" content="">
	<title>ProAdvance</title>
    <link rel="stylesheet" href="<?php echo $_SESSION['vista']=='home'?'css/main.css':'../css/main.css';?>">
	<script src="https://use.fontawesome.com/914846b21d.js"></script>
	<script src="<?php echo $_SESSION['vista']=='home'?'js/jquery.min.js':'../js/jquery.min.js'; ?>"></script>
<script src="<?php echo $_SESSION['vista']=='home'?'js/plugins.js':'../js/plugins.js'; ?>"></script>
<script src="<?php echo $_SESSION['vista']=='home'?'js/bootstrap.min.js':'../js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo $_SESSION['vista']=='home'?'js/canvas.js':'../js/canvas.js'; ?>"></script>
</head>
<header id="header">
  <div class="container content">
    <div class="row">
        <div class="col-md-4 col-sm-5 logo" onclick="inicio();">
                <label><img src="<?php echo $_SESSION['vista']=='home'?'imagenes/applogo.png':'../imagenes/applogo.png';?>"> ProadAvance</label>
        </div>
        <div class="col-md-6 col-md-offset-2 col-sm-7 login">
          <!--<div class="vertical-align">-->
						<?php if (empty($_SESSION['profesor'])){ ?>
						<form id="form-login" action="db/validar-usuario.php" method="post">
							<div class="col-md-8 col-sm-8">
								<div class="campo-login">
									<i class="fa fa-user" aria-hidden="true"></i>
									<input class="user" type="text" name="datos[Usuario]"  placeholder="Usuario" required>
								</div>
                <div class="campo-login">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
                	<input class="password" type="password" name="datos[Contraseña]"  placeholder="Contraseña" required>
                </div>

							</div>
							<div class="col-md-4 col-sm-4 btns_login">
								<button type="submit" class="btn_entrar">Entrar</button>
								<button type="button" class="btn_registrar" onclick="show_lightbox();">Registrar</button>
							</div>
						</form>
					<?php } elseif (!empty($_SESSION['profesor'])){ ?>
						<div class="logout" onclick="menu_header();">
							<div class="foto">
								 <i class="fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="texto">
								<p><?php echo $_SESSION['profesor']->nombre." ".$_SESSION['profesor']->apellidop; ?></p>
							</div>
							<div class="submenu">
								 <i class="fa fa-chevron-down" aria-hidden="true"></i>
							</div>

						</div>
						<nav class="menu-header">
							<li onclick="inicio();">Inicio</li>
							<li onclick="perfil();">Mi perfil</li>
							<li onclick="cerrar_session('<?php echo $_SESSION['vista']=='home'?'db/cerrar.php':'../db/cerrar.php';?>');">Salir</li>
						</nav>

						<?php } ?>

          <!--</div>-->
        </div>
    </div>
  </div>
</header>

<!--
