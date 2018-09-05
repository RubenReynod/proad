<!DOCTYPE html>
<html>
<head>
	<title>Cargando..</title>
	@include('shared.css')
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	@include('shared.jsDir')
</head>
<body class="page-body login-page">
	<div id="app" style="height: 100%;">
		<div v-if="logged" class="container-fluid" id="home">
			<logout></logout>
			<div class="row h-100">
				<div class="col h-100 pr-0 pl-0 content_menu">
					<admin-menu></admin-menu>
				</div>
				<div class="col pr-0 pl-0">
					<div class="info-user"></div>
					<div class="Views">
						<router-view ref="view"></router-view>	
					</div>
				</div>
			</div>
		</div>
		<div v-else>
			<login></login>
		</div>
	</div>	
	<script type="text/javascript" src="public/js/admin.js"></script>
	@include('shared.js')
</body>
</html>