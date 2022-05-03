/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vuetify from "../plugins/vuetify";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('find-pista', require('./components/FindPista.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     vuetify: Vuetify,
     el: '#app',
 });
 
 import moment from 'moment';
import Vue from "vue";
 
 Vue.filter('formatDate', function(value) {
     if (value) {
         return moment(String(value)).format('DD-MM-YYYY')
     }
 });


 $(".cerrarModal").click(function(){
    $("#modalDetalle").modal('hide')
  });

  $('.cerrarModales').click(function(){
    $('#registerModal').modal('hide');
    $('#loginModal').modal('hide');
    $('.formu').removeClass('oculto');
  })


  $('.login_button').on('click',function(){
   
    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
    $('.formu').addClass('oculto');
});
$('.register_button').on('click',function(){
  
    $('#loginModal').modal('hide');
    $('.formu').addClass('oculto');
    $('#registerModal').modal('show');
}); 
$(function() {
	'use strict';
	
  $('.form-control').on('input', function() {
	  var $field = $(this).closest('.form-group');
	  if (this.value) {
	    $field.addClass('field--not-empty');
	  } else {
	    $field.removeClass('field--not-empty');
	  }
	});

});


