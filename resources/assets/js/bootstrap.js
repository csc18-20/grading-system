import Popper from "popper.js";
import Vue from "vue";
import jquery from "jquery";
import 'datatables.net';
import axios from "axios";
window.Vue = Vue;
window.Popper = Popper;

window.$ = window.jQuery = jquery;

require("bootstrap");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');
window.laravel_token=token.content;
if (token) {
	window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
	console.error(
		"CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
	);
}
$(document).ready(function() {
    $('.datatable').DataTable();
 });
