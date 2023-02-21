
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.Vue2Filters = require('vue2-filters');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/** Vue2Filter */
Vue.use(Vue2Filters);
/** Productos */
Vue.component('prod-index', require('./components/prod/get.vue').default);
Vue.component('prod-add', require('./components/prod/prodAdd.vue').default);
Vue.component('prod-create', require('./components/prod/create.vue').default);
Vue.component('prod-show', require('./components/prod/show.vue').default);
Vue.component('prod-indexv', require('./components/prod/indexv.vue').default);

/** Inventario */
Vue.component('inven-create', require('./components/inven/create.vue').default);

/** Archivo  */
Vue.component('arc-marca', require('./components/archivos/marca.vue').default);
Vue.component('arc-unidad', require('./components/archivos/unidad.vue').default);
Vue.component('arc-linea', require('./components/archivos/linea.vue').default);
Vue.component('arc-familia', require('./components/archivos/familia.vue').default);

/** Compras */
Vue.component('comp-index', require('./components/comp/index.vue').default);
Vue.component('comp-create', require('./components/comp/create.vue').default);
Vue.component('comp-show', require('./components/comp/show.vue').default);


/** Proveedores */
Vue.component('prov-index', require('./components/prov/index.vue').default);
Vue.component('prov-create', require('./components/prov/create.vue').default);
Vue.component('prov-show', require('./components/prov/show.vue').default);

/** Clientes */
Vue.component('client-create', require('./components/cliente/create.vue').default);
Vue.component('client-add', require('./components/cliente/agregar.vue').default);
Vue.component('client-show', require('./components/cliente/show.vue').default);

/** Venta */
Vue.component('venta-create', require('./components/venta/create.vue').default);
Vue.component('venta-index', require('./components/venta/index.vue').default);
Vue.component('venta-show', require('./components/venta/show.vue').default);
Vue.component('venta-pago', require('./components/venta/pago.vue').default);
Vue.component('venta-xml', require('./components/venta/addxml.vue').default);

/** Informes */
Vue.component('info-cuenta', require('./components/info/cuenta.vue').default);
Vue.component('rotacion-venta', require('./components/info/rotacionv.vue').default);

// Vue.component('', require().default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted(){
        // console.log("up");
    },
    
});
