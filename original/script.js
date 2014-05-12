// media query event handler
if (matchMedia) {
	var mq = window.matchMedia("(min-width: 1020px)");
	mq.addListener(WidthChange);
	WidthChange(mq);
}


// media query change
function WidthChange(mq) {

	if (mq.matches) {
		headline_top = 270;
		
		// window width is at least 500px
	}
	else {
		headline_top = 200;
		// window width is less than 500px
	}

}



// Parallax
$(document).ready(function(){
    $("#logoSmall").hide();
    $('section[data-type="background"]').each(function(){
        var $bgobj = $(this); // assigning the object
        $(window).scroll(function() {
            var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
             
            // Put together our final background position
            var coords = '50% '+ yPos + 'px';
 
            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        }); 
    });
});


// headline opacity change with scroll
$(window).scroll(function () {
    $('[id^="headline"]').each(function () {
        if (($(this).offset().top - $(window).scrollTop()) < 200) {
            $(this).stop().fadeTo('fast', 0);
        } else {
            $(this).stop().fadeTo('fast', 1);
        }
    });
});

// Logo Scroll Hide/Show
$(window).scroll(function () {
    $('[id^="sectionLevels"]').each(function () {
        if (($('#sectionLevels').offset().top - $(window).scrollTop()) < 80) {
            //Hide bigger logo
		    $('#logo').stop().fadeTo('fast', 0);
			$('#logo').stop().animate({top:'-240px'});
			//Show small logo
			$("#logoSmall").stop().show();
       	    $("#logoSmall").stop().fadeTo('fast', 1);
        } else {
			//Show bigger logo
            $('#logo').stop().fadeTo('fast', 1);
			$('#logo').stop().animate({top:'0px'});
			//Hide small logo
			$("#logoSmall").stop().fadeTo('fast', 0);
		    $("#logoSmall").stop().hide();
        }
    });
});

//Login Call Out 
$(document).ready(function(){
$("#bubble").hide().delay( 3100 );					   
$("#bubble").slideDown( 300 ).delay( 9999 );
$("#bubble").fadeOut().delay(1);	
})

// Animated Boxes
$(document).ready(function(){
	//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
	//Vertical Sliding
	$('.boxgrid.slidedown').hover(function(){
		$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
	}, function() {
		$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
	});
	//Horizontal Sliding
	$('.boxgrid.slideright').hover(function(){
		$(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});
	}, function() {
		$(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
	});
	//Diagnal Sliding
	$('.boxgrid.thecombo').hover(function(){
		$(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
	}, function() {
		$(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
	});
	//Partial Sliding (Only show some of background)
	$('.boxgrid.peek').hover(function(){
		$(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	});
	//Full Caption Sliding (Hidden to Visible)
	$('.boxgrid.captionfull').hover(function(){
		$(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'260px'},{queue:false,duration:160});
	});
	//Caption Sliding (Partially Hidden to Visible)
	$('.boxgrid.caption').hover(function(){
		$(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'220px'},{queue:false,duration:160});
	});
});

// Varied Scroll Speeds

$(window).bind('scroll',function(e){
    scrollSpeed();
});
 
function scrollSpeed(){
    var scrolled = $(window).scrollTop();
    $('#headline').css('top',(headline_top-(scrolled*-2))+'px');
    $('#sectionLevels').css('top',(0-(scrolled*2))+'px');
    $('#sectionHome').css('top',(0-(scrolled*2))+'px');
}

// Auto Scroll
  $(function() {
	$('a[href*=#]:not([href=#])').click(function() {
	  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
		  $('html,body').animate({
			scrollTop: target.offset().top
		  }, 1000);
		  return false;
		}
	  }
	});
  });