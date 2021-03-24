require(['jquery',], function () {
	jQuery(document).ready(function($){
	 
	  (function(selector){
	
	   var $menuselector = $(selector);
	   var $menuhoverselector = $($menuselector).find(".advance-menu > li.level0");
	   //console.log($menuselector);
	   //console.log($menuhoverselector);
	   $menuhoverselector.hover(function(){
			var extraWidth  = 0;
			var leftpos  = 0;
			var rightpos  = 0;
			var width_popup;
			$(this).addClass('menu-active');
			var listwidth = $(this).outerWidth(true);
			// Width padding + margin + border
			var totalWidth  = $(this).find('.popup-menu').outerWidth(true);
			// only content width
			var actualWidth = $(this).find('.popup-menu').width();
			// extra width
			extraWidth = totalWidth - actualWidth;
			var topblock = $(this).find('.popup-menu .popup-menu-top').outerWidth(true);
			var middleblock = $(this).find('.popup-menu').width();
			var bottomblock = $(this).find('.popup-menu .popup-menu-bottom').outerWidth(true);
			//alert(middleblock);
			if(middleblock && !topblock && !bottomblock) {
				width_popup = middleblock;	
			}
			if(!middleblock && (topblock || bottomblock)) {
				if(topblock && !bottomblock){
					width_popup = topblock;
				} else if(!topblock && bottomblock){
					width_popup = bottomblock;
				} else {
					if(topblock >= bottomblock) {
						width_popup = topblock;	
					} else {
						width_popup = bottomblock;	
					}
				} 	
			}
			
			if(middleblock && (topblock || bottomblock)) {
				if(topblock && !bottomblock){
					if(topblock >= middleblock) {
						width_popup = topblock;	
					} else {
						width_popup = middleblock;	
					}	
				} else if(!topblock && bottomblock){
					if(bottomblock >= middleblock) {
						width_popup = bottomblock;	
					} else {
						width_popup = middleblock;	
					}	
				} else {
					if(topblock >= bottomblock) {
						if(topblock >= middleblock) {
						width_popup = topblock;	
						} else {
							width_popup = middleblock;	
						}	
					} else {
						if(bottomblock >= middleblock) {
							width_popup = bottomblock;	
						} else {
							width_popup = middleblock;	
						}		
					}
				} 	
			}
			var outer_width_popup = width_popup + extraWidth;
			
			//console.log(outer_width_popup);
			/*define left of the popup*/
			
			var wraper = $menuselector;
			var wraper_main = wraper.outerWidth();
			var right_wrapper = wraper_main*0.6;
			//alert(wraper_main);
			var wraper_offset =  wraper.offset();
			//console.log(wraper_offset);
			var pos = $(this).offset();
			
			var leftpos  = pos.left - wraper_offset.left;
			
			var rightposnew  = wraper_main - leftpos;
			var rightpos = rightposnew - listwidth;
			/* old code 
			if ((leftpos + outer_width_popup) > wraper_main){
				leftpos = wraper_main - outer_width_popup;
				$(this).find('.popup-menu').css('right',rightpos);
				$(this).find('.popup-menu').css('left','auto');
			} else {	
				if(leftpos > right_wrapper) {
					$(this).find('.popup-menu').css('right',rightpos);
					$(this).find('.popup-menu').css('left','auto');	
				} else {
					$(this).find('.popup-menu').css('left',leftpos);	
					$(this).find('.popup-menu').css('right','auto');	
				}
			}
			*/
			/* new code */
			$(this).find('.popup-menu').css('left',leftpos);	
		    $(this).find('.popup-menu').css('right','auto');		
			
			
			//$(this).find('.popup-menu').css('width',width_popup);
			//$(this).find('.popup-menu .popup-menu-middle').css('width',width_popup);
						
		},function(){
			$(this).removeClass('menu-active');
		});
	
	  })('#advancemenu');
	
	});
});	
