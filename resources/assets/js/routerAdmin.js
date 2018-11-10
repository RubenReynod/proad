import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const page="./components/admin/";

const MyRouter = new VueRouter({
  	routes:[
	    { path: '/', redirect:"/login"},
	    { path: '/login', component: require(page+'login.vue'), meta:{title:"Login"}},
	    //Avances programaticos
	    { path: '/avances_programaticos', component: require(page+'avances_programaticos/index.vue') },
	  ]
});

//Titulos del website
import VueDocumentTitlePlugin from "vue-document-title-plugin";
Vue.use(VueDocumentTitlePlugin, MyRouter, 
	{ defTitle: "Base laravel", filter: (title)=>{ return title+" - Base laravel"; } }
);
	  
// export {routes};
export default MyRouter;