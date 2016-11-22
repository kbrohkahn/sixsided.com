requirejs.config({
	paths: {
		"jquery": "jquery-2.1.4.min",
		"bootstrap": "bootstrap.min",
		"braintree": "braintree-2.29.0.min"
	},
	shim: {
		"bootstrap": {
			deps: ["jquery"]
		}
	}
});

define(['jquery'], function ($) {
	console.log( $ ) // OK
	require(['purchase']);
});



define(['braintree'], function (braintree) {});

// requirejs(["jquery", "braintree"], function ($, braintree) {
// 	$(document).ready(function() {
// 		braintree.setup('', 'dropin', {
// 			container: 'braintree-form'
// 		});

// 	});
// });

requirejs(["sorttable"], function() {});

requirejs(["bootstrap"], function() {});
