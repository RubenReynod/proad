<template>
	<main role="main">
		<div id="login">
			<div class="img-fondo">
				<img src="public/images/udg.png">
			</div>
			<div class="login">
				<img class="logo" src="public/images/logo.png">
				<p class="description text-center">Bienvenido</p>
				<form type="post" class="text-right" v-on:submit.prevent="login()">
					<div class="input-content">
						<input type="text" placeholder="Nip" required>
						<i class="fas fa-user"></i>
					</div>
					<div class="input-content">
						<input type="password" placeholder="Codigo" required>
						<i class="fas fa-key"></i>
					</div>
					<button>Entrar</button>
				</form>
			</div>
		</div>
	</main>
</template>

<script type="text/javascript">
	export default {
        mounted() {

        },
        methods:{
        	login(){
        		this.percent=50;
        		this.inPetition=true;
        		axios.post(tools.url("/api/profesores"),this.credentials).then((response)=>{
			    	this.$parent.user=response.data.user;
			    	this.$parent.token=response.data.token;
			    	localStorage.setItem("token",this.$parent.token);
			    	this.$parent.logged=true;
			    	this.$parent.showMessage("Bienvenido "+this.$parent.user.name);
			    	if(this.$route.path=="/login"){
			    		this.$router.push('/home');
			    	}
			        this.inPetition=false;
			        this.error=false;
			    }).catch((error)=>{
			        this.error=error.response.data.error;		
			        console.log(error);	        
			        this.inPetition=false;
			    });
        	},
			logo(){
				return window.tools.url('public/images/logo.png');
			}        	
        },
        data:function(){
        	return {
        		inPetition:false,
        		percent:0,
        		error:false,
        		credentials:{
        			email:"",
        			password:""
        		}
        	}
        }
    }
</script>