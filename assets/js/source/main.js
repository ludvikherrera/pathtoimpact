window.DMF = {

	// All pages
	global: {
		init: function() {
			//this.initEqualHeight();

			$('#header-close').click(function(e){
				e.preventDefault();
				$('.header-block').slideUp();
				var d = new Date();
				var cname = "dmf_newsletter";
				var cvalue = 0;
				d.setTime(d.getTime() + (365*24*60*60*1000));
				var expires = "expires=" + d.toGMTString();
				//document.cookie = cname+"="+cvalue+"; "+expires;
				document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
	        });

	        $('#message-close').click(function(e){
				e.preventDefault();
				$('.resource-notification').slideUp();
				var d = new Date();
				var cname = "dmf_resource_message";
				var cvalue = 1;
				d.setTime(d.getTime() + (365*24*60*60*1000));
				var expires = "expires=" + d.toGMTString();
				document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
	        });

	        $(".form-newsletter :input").each(function(index, elem) {
			    var eId = $(elem).attr("id");
			    var label = null;
			    if (eId && (label = $(elem).parents("form").find("label[for="+eId+"]")).length == 1) {
			        $(elem).attr("placeholder", $(label).html());
			        $(label).remove();
			    }
			});

			$(".newsletter-signup input[type='text']").each(function(index, elem) {
			    var eId = $(elem).attr("id");
			    var label = null;
			    if (eId && (label = $(elem).parents("form").find("label[for="+eId+"]")).length == 1) {
			        $(elem).attr("placeholder", $(label).html());
			        $(label).remove();
			    }
			});
		},

		// Grid Overlay
		initEqualHeight: function() {

		},

	},

};

UTIL = {

	fire : function(func,funcname, args){

		var namespace = DMF;

		funcname = (funcname === undefined) ? 'init' : funcname;
		if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
			namespace[func][funcname](args);
		}

	},

	loadEvents : function($){

		var bodyId = document.body.id;

		// hit up common first.
		UTIL.fire('global');

		// do all the classes too.
		$.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
			UTIL.fire(classnm);
			UTIL.fire(classnm,bodyId);
		});

	}
};

// kick it all off here
$(document).ready(UTIL.loadEvents);