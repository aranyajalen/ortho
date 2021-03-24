
define(['jquery'], function($) {
							
	require(['jquery','themecarousel',], function () {
				jQuery(document).ready(function (){
					jQuery(".homepage-carousel").owlCarousel({
						items: 1,
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
						autoplay:true,
						autoplayTimeout:4000,
						loop:true,
						smartSpeed:450,
						nav:true,
						navText:[
							"<div class='prev-button'>prev</div>",
							"<div class='next-button'>next</div>"
						]
					});
					
					jQuery(".testimonial-carousel").owlCarousel({
						items: 1,
						slideSpeed: 900,
						autoplay:true,
						autoplayTimeout:4000,
						loop:true,
						nav:true,
						navText:[
							"<div class='prev-button'>prev</div>",
							"<div class='next-button'>next</div>"
						]
					});
					
					
					jQuery(".single-product .owl-carousel").owlCarousel({
						items: 1,
						autoplay:false,
						autoplayTimeout:4000,
						loop:true,
						smartSpeed:450,
						nav:false,
						navText:[
							"<div class='prev-button'>prev</div>",
							"<div class='next-button'>next</div>"
						]
					});
					
					jQuery(".owl-carousel.related-blog-slider").owlCarousel({
					items: 3,
						responsive:{
							0:{  
									items:2  
							},
							480:{  
									items:2
							},
							768:{  
									items:3
							},
							980:{
									items:3
							}
							
						},
						nav:false,
						navText:[
							"<div class='prev-button'>prev</div>",
							"<div class='next-button'>next</div>"
						]
					   });
					
						jQuery(".blog-carousel").owlCarousel({
							items: 1,
							responsive:{
								0:{  
										items:1  
								},
								480:{  
										items:1
								},
								768:{  
										items:1
								},
								980:{
										items:1
								}
								
							},
							nav:false,
							navText:[
								"<div class='prev-button'>prev</div>",
								"<div class='next-button'>next</div>"
							]
						});
					
						jQuery(".brand-carousel").owlCarousel({
							items: 6,
								responsive:{
									0:{  
											items:2  
									},
									480:{  
											items:3
									},
									768:{  
											items:5
									},
									1401:{
											items:6	
									}
									
								},
								nav:true,
								autoplay:true,
								autoplayTimeout:4000,
								loop:true,
								navText:[
									"<div class='prev-button'>prev</div>",
									"<div class='next-button'>next</div>"
								]
						 });
						
						jQuery( ".panel.header ul.header.links" ).clone().prependTo( ".header_toggle_menu" );
						
						
					
				});
	});
	
	
	
	
	
	require(['jquery','themebootstrap','themebacktotop','themecarousel','treeview','themeparallax','lightbox',], function () {
			 
			 jQuery(document).ready(function () {
				
				// Owl Carousel Initialize 
				initialize_owl(jQuery('.bestseller-slider.owl-carousel'));
				initialize_owl(jQuery('.featured-slider.owl-carousel'));
				initialize_owl(jQuery('.new-slider.owl-carousel'));
				initialize_owl(jQuery('.special-slider.owl-carousel'));
				initialize_owl(jQuery('.related-slider.owl-carousel'));
				
				/*
				initialize_owl(jQuery('#category1'));
			
				jQuery('a[href="#tab1"]').on('shown.bs.tab', function () {
					initialize_owl(jQuery('#category1'));
				})
			
				jQuery('a[href="#tab2"]').on('shown.bs.tab', function () {
					initialize_owl(jQuery('#category2'));
				})
			
				jQuery('a[href="#tab3"]').on('shown.bs.tab', function () {
					initialize_owl(jQuery('#category3'));
				})
				*/
			});
			
			// Left Sidebar Category Tree View Js Start 
			function leftSidebarCategory(){
				jQuery("#sidetree").treeview({
					collapsed: true,
					animated: "medium",
					persist: "location"
				});	
				jQuery("#sidetree li.active").addClass('collapsable');
				jQuery("#sidetree li.active").removeClass('expandable');
				jQuery("#sidetree li.active > .hitarea").addClass('collapsable-hitarea');
				jQuery("#sidetree li.active > .hitarea").removeClass('expandable-hitarea');
				jQuery("#sidetree li.active > ul").css('display','block');
			}
			jQuery(document).ready(function (){leftSidebarCategory()});
			//jQuery(window).resize(function(){leftSidebarCategory();}); 
			
			
			// Parallax Background Image Js Start
			function ParallaxImage(){
				var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
				if(!isMobile) {
					if(jQuery(".parallax-block").length){  jQuery(".parallax-block").ParallaxBackground({  invert: false });};    
				}else{
					jQuery(".parallax-block").ParallaxBackground({  invert: true });	
				}	
			}
			jQuery(document).ready(function (){ParallaxImage()});
			//jQuery(window).resize(function(){ParallaxImage();}); 
				
			function initialize_owl(el) {
				el.owlCarousel({
						items: 4,
						responsive:{
							0:{  
									items:2  
							},
							480:{  
									items:2
							},
							640:{  
									items:3
							},
							992:{
									items:4	
							}
							
						},
						nav:true,
						loop:true,
						navText:[
							"<div class='prev-button'>prev</div>",
							"<div class='next-button'>next</div>"
						]
				});
			}
	
		function ToggleIcon(){
				if (jQuery(window).width() <= 992)
				{
					jQuery(".page-footer .footer-common h5 .toggleicon").remove();
					jQuery(".page-footer .footer-common h5").append( "<a class='toggleicon'>&nbsp;</a>" );
					jQuery(".page-footer .footer-common h5").addClass('toggle-active');
					jQuery(".page-footer .footer-common h5 .toggleicon").click(function(){
						jQuery(this).parent().toggleClass('active').parent().find('.footer-content').toggle('slow');
					});
			
				}else{
					jQuery(".page-footer .footer-common h5").parent().find('ul').removeAttr('style');
					jQuery(".page-footer .footer-common h5").removeClass('active');
					jQuery(".page-footer .footer-common h5").removeClass('toggle');
					jQuery(".page-footer .footer-common h5 .toggleicon").remove();
				}	
		}
		jQuery(document).ready(function(){ToggleIcon();});
		jQuery(window).resize(function(){ToggleIcon();}); 
		
		
		function LeftToggleIcon(){
				if (jQuery(window).width() < 768)
				{
					jQuery(".sidebar  .block-title strong .toggleicon").remove();
					jQuery(".sidebar  .block-title strong").append( "<a class='toggleicon'>&nbsp;</a>" );
					jQuery(".sidebar  .block-title strong").addClass('toggle-active');
					jQuery(".sidebar  .block-title strong .toggleicon").click(function(){
						jQuery(this).parent().toggleClass('active').parent().parent().find('.block-content').toggle('slow');
					});
			
				}else{
					jQuery(".sidebar  .block-title strong").parent().parent().find('.block-content').removeAttr('style');
					jQuery(".sidebar  .block-title strong").removeClass('active');
					jQuery(".sidebar  .block-title strong").removeClass('toggle');
					jQuery(".sidebar  .block-title strong  .toggleicon").remove();
				}	
		}
		jQuery(document).ready(function(){LeftToggleIcon();});
		jQuery(window).resize(function(){LeftToggleIcon();}); 
	
		function SearchIcon(){
			  jQuery("#search").focus(function(){
					jQuery(this).parent().parent().parent().addClass("search-focus");
			  }).blur(function(){
				   jQuery(this).parent().parent().parent().removeClass("search-focus");				  
			  });				
	
		}
		jQuery(document).ready(function(){SearchIcon();});
			
	});
	
	
	
	/* For responsive Menu in Mobile Remove Div */
	require(['jquery','advancemenu',], function () {
		jQuery(document).ready(function () {
			jQuery("#mobilemenu .level-top").each(function() {
				jQuery(this).find(".popup-menu-top").remove();	
				jQuery(this).find(".popup-menu-bottom" ).remove();	
				jQuery(this).find(".popup-menu-inner").contents().unwrap();
				jQuery(this).find(".popup-menu").contents().unwrap();
			});	
		});	
	});



});