// JS Scripts - WSU - Nick Kind & Amy Gustavsen, Sonar Group 170404

// DOCUMENT READY 

$(document).ready(function(){
	mobileMenu();
	navHovers();
});

// END DOCUMENT READY 

// DOCUMENT RESIZE 

$(window).resize(function(){

});

// END DOCUMENT RESIZE 

// FUNCTIONS 

	function navHovers(){
		
		$('#primary_nav li').hover(
			function() {
	     		$(this).children('.sub-menu').show();
	   		},
			function() {
	      		$(this).children('.sub-menu').hide();
	   		}
		);
	}	

	function mobileMenu(){
		
		// BUTTON CONTROL
		
		$('#mobile_expand').click(function(){
			
			$(this).hide();
			$('#mobile_close').fadeIn();
			$('#mobile_veil').fadeIn();
			
			// SCROLL TO TOP
			$("html, body").animate({ scrollTop: 0 });	
				
			// OPENS MENU
			$('#mobile_menu').slideDown();
					
		});
		
		$('#mobile_close').click(function(){
			
			$(this).hide();						
			$('#mobile_menu').slideUp();
			$('#mobile_veil').fadeOut();
			
			setTimeout(function(){						
				$('#mobile_primary_nav li.menu-item-has-children .sub-menu').slideUp();
			}, 1000);			
			
			
		});	
		
		// BACK TO TOP BUTTON IN HOVER VEIL
		
		$('#back_to_top').click(function(){	
			$("html, body").animate({ scrollTop: 0 });
		});	
		
		
		// CREATE BUTTONS TOP OPEN CHILD MENUS
		
		$('#mobile_primary_nav li.menu-item-has-children').each(function(){
			$(this).append('<button title="touch to open sub menu">&#xf0d7;</button>');
		});
		
		// OPEN CHILD MENUS
		$('#mobile_primary_nav li.menu-item-has-children button').each(function(){
			$(this).click(function(){
				$(this).siblings('.sub-menu').slideDown();
			});
		
		});
	}

	
	
// PLUGINS 


// END SCRIPTS