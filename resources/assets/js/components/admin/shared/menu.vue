<template>
	<div id="menu">
		<nav>
			<div class="logo">
				<img src="public/images/logo.png">
			</div>
			<ul>
				<li class="mainBn"><p>Inicio</p><div class="icon"><i class="fas fa-home"></i></div></li>
				<li class="mainBn">
					<p>Avances programaticos</p>
					<div class="icon">
						<i class="fas fa-book"></i>
						
					</div>
					<ul v-bind:class="{ active : statusMenu=='avance' }">
						<li>Materias</li>
						<li>Unidades</li>
						<li>Subtemas</li>
					</ul>
					<div class="btn_submenu" v-on:click="statusMenu=statusMenu=='avance'?'':'avance'">
						<i class="fas fa-chevron-down" v-if="statusMenu!='avance'"></i>
						<i class="fas fa-chevron-up" v-else></i>
					</div>
				</li>
			</ul>
		</nav>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				statusMenu: '',
				menu:{}
			}
		},
		methods:{

		},
        mounted() {

        }
    }
</script>