<template>
	<div id="logout">
		<div class="exit" v-on:click="logout()">Salir<i class="fas fa-sign-out-alt"></i></div>
	</div>
</template>
<script>
	export default{
		methods:{
			logout: function(){
                axios.post('/api/logout').then((resp) => {
                    this.$parent.user={};
			    	this.$parent.token="";
			    	localStorage.removeItem('token');
			    	this.$parent.logged=false;
			    	this.$router.push('/');
			        this.inPetition=false;
                }).catch((error) => {

                });
			}
		}
	}
</script>