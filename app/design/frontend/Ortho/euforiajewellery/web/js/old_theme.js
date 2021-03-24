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
						"<i class='fa fa-angle-left fa-2x'></i>",
						"<i class='fa fa-angle-right fa-2x'></i>"
					]
                });
				
				
				
				
				
				
				jQuery(".bestseller-slider.owl-carousel").owlCarousel({
                    items: 4,
                    itemsDesktop: [1080, 4],
                    itemsDesktopSmall: [860, 3],
                    itemsTablet: [768, 3],
                    itemsTabletSmall: [639, 2],
                    itemsMobile: [360, 2],
                    nav:true,
					navText:[
						"<i class='fa fa-angle-left fa-2x'></i>",
						"<i class='fa fa-angle-right fa-2x'></i>"
					]
                });
				
				jQuery(".featured-slider.owl-carousel").owlCarousel({
                    items: 4,
                    itemsDesktop: [1080, 4],
                    itemsDesktopSmall: [860, 3],
                    itemsTablet: [768, 3],
                    itemsTabletSmall: [639, 2],
                    itemsMobile: [360, 2],
                    nav:true,
					loop:true,
					navText:[
						"<i class='fa fa-angle-left fa-2x'></i>",
						"<i class='fa fa-angle-right fa-2x'></i>"
					]
                });
				
				jQuery(".new-slider.owl-carousel").owlCarousel({
                    items: 4,
                    itemsDesktop: [1080, 4],
                    itemsDesktopSmall: [860, 3],
                    itemsTablet: [768, 3],
                    itemsTabletSmall: [639, 2],
                    itemsMobile: [360, 2],
                    nav:true,
					loop:true,
					navText:[
						"<i class='fa fa-angle-left fa-2x'></i>",
						"<i class='fa fa-angle-right fa-2x'></i>"
					]
                });
				
				jQuery(".special-slider.owl-carousel").owlCarousel({
                    items: 4,
                    itemsDesktop: [1080, 4],
                    itemsDesktopSmall: [860, 3],
                    itemsTablet: [768, 3],
                    itemsTabletSmall: [639, 2],
                    itemsMobile: [360, 2],
                    nav:true,
					loop:true,
					navText:[
						"<i class='fa fa-angle-left fa-2x'></i>",
						"<i class='fa fa-angle-right fa-2x'></i>"
					]
                });
				
				jQuery(".related-slider.owl-carousel").owlCarousel({
                    items: 4,
                    itemsDesktop: [1080, 4],
                    itemsDesktopSmall: [860, 3],
                    itemsTablet: [768, 3],
                    itemsTabletSmall: [639, 2],
                    itemsMobile: [360, 2],
                    nav:true,
					loop:true,
					navText:[
						"<i class='fa fa-angle-left fa-2x'></i>",
						"<i class='fa fa-angle-right fa-2x'></i>"
					]
                });
				
				
            });
});





require(['jquery','themebootstrap','themebacktotop','themecarousel','treeview','themeparallax',], function () {
            
			
			jQuery(document).ready(function (){
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
											 
			});
			
			
			jQuery(document).ready(function (){
				var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
				if(!isMobile) {
					if(jQuery(".parallax-background").length){  jQuery(".parallax-background").ParallaxBackground({  invert: false });};    
				}else{
					jQuery(".parallax-background").ParallaxBackground({  invert: true });	
				}	
          });
			
		jQuery(document).ready(function () {
		
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
		});

});

function initialize_owl(el) {
    el.owlCarousel({
			items: 4,
			itemsDesktop: [1080, 4],
			itemsDesktopSmall: [860, 3],
			itemsTablet: [768, 3],
			itemsTabletSmall: [639, 2],
			itemsMobile: [360, 2],
			nav:true,
			navigation : true,
			navText:[
				"<i class='fa fa-angle-left fa-2x'></i>",
				"<i class='fa fa-angle-right fa-2x'></i>"
			]
    });
}
