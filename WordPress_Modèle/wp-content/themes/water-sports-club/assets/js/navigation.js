/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});
});

function water_sports_club_open() {
	jQuery(".sidenav").addClass('show');
}
function water_sports_club_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function water_sports_club_menuAccessibility() {
	var links, i, len,
	    water_sports_club_menu = document.querySelector( '.nav-menu' ),
	    water_sports_club_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let water_sports_club_focusableElements = 'button, a, input';
	let water_sports_club_firstFocusableElement = water_sports_club_iconToggle; // get first element to be focused inside menu
	let water_sports_club_focusableContent = water_sports_club_menu.querySelectorAll(water_sports_club_focusableElements);
	let water_sports_club_lastFocusableElement = water_sports_club_focusableContent[water_sports_club_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! water_sports_club_menu ) {
    	return false;
	}

	links = water_sports_club_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === water_sports_club_firstFocusableElement) {
		        water_sports_club_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === water_sports_club_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	water_sports_club_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    water_sports_club_menuAccessibility();
  	});
  	$('.search-toggle').click(function () {
	    water_sports_club_trapFocus($('.search-outer'));
  	});
});

function water_sports_club_search_open() {
	jQuery(".search-outer").addClass('show');
}
function water_sports_club_search_close() {
	jQuery(".search-outer").removeClass('show');
}

function water_sports_club_trapFocus(elem) {

    var water_sports_club_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var water_sports_club_firstTabbable = water_sports_club_tabbable.first();
    var water_sports_club_lastTabbable = water_sports_club_tabbable.last();
    /*set focus on first input*/
    water_sports_club_firstTabbable.focus();

    /*redirect last tab to first input*/
    water_sports_club_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            water_sports_club_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    water_sports_club_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            water_sports_club_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};