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
                    this.$root.user={};
			    	this.$root.token="";
			    	localStorage.removeItem('token');
			    	this.$root.logged=false;
			    	this.$root.push('/');
			        this.inPetition=false;
                }).catch((error) => {

                });
			}
		}
	}
</script>