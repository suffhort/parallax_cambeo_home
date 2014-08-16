require.config({
	baseUrl: "scripts/",
	paths: {
		'skrollr'       : "skrollr.min",
		'skrollr_menu'  : "skrollr.menu.min"
	},
	waitSeconds: 15
});

require(['skrollr','skrollr_menu'], function(skrollr, skrollr_menu){
	var s = skrollr.init({
		edgeStrategy: 'set',
		easing: {
			WTF: Math.random,
			inverted: function(p) {
				return 1-p;
			}
		},
		smoothScrollingDuration: 1500
	});

	skrollr_menu.menu.init(s, {
	    //skrollr will smoothly animate to the new position using `animateTo`.
	    animate: true,

	    //The easing function to use.
	    easing: 'sqrt',

	    //Multiply your data-[offset] values so they match those set in skrollr.init
	    scale: 2,

	    //How long the animation should take in ms.
	    duration: function(currentTop, targetTop) {
	        //By default, the duration is hardcoded at 500ms.
	        return 1500;

	        //But you could calculate a value based on the current scroll position (`currentTop`) and the target scroll position (`targetTop`).
	        //return Math.abs(currentTop - targetTop) * 10;
	    }

	    //If you pass a handleLink function you'll disable `data-menu-top` and `data-menu-offset`.
	    //You are in control where skrollr will scroll to. You get the clicked link as a parameter and are expected to return a number.
	    // handleLink: function(link) {
	    //     return 400;//Hardcoding 400 doesn't make much sense.
	    // }
	});

});

