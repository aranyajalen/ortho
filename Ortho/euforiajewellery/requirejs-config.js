/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {	
            themecarousel :  'js/owl.carousel',
			themenew :  'js/themenew',
			themeparallax :  'js/jquery.ui.totop',
			themebacktotop :  'js/ParallaxBackground',
			treeview	   :  'js/jquery.treeview',
			advancemenu	   :  'js/advancemenu',
			lightbox	   :  'js/lightbox',
			themebootstrap :  'bootstrap/js/bootstrap.min'
        }
    },
	'shim': {
			'themecarousel': {
					deps: ['jquery']
			},
			'themenew': {
					deps: ['jquery']
			},
			'themeparallax': {
					deps: ['jquery']
			},
			'themebacktotop': {
					deps: ['jquery']
			},
			'advancemenu': {
					deps: ['jquery']
			},
			'lightbox': {
					deps: ['jquery']
			},
			'treeview': {
					deps: ['jquery']
			},
			'themebootstrap': {
					deps: ['jquery']
			}
	}
};
