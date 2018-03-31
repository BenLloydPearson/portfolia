/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
    // Link text color.
	wp.customize( 'portfolia_link_textcolor', function( value ) {
		value.bind( function( to ) {
            $( '.site-content a' ).css( {
                'color': to
            } );
		} );
	} );
    // :Left bar background color.
	wp.customize( 'portfolia_left_background_color', function( value ) {
		value.bind( function( to ) {
            $( '.site-left' ).css( {
                'background-color': to
            } );
		} );
	} );
    wp.customize( 'portfolia_left_button_color', function( value ) {
		value.bind( function( to ) {
            $( '#primary-menu li' ).css( {
                'background-color': to
            } );
		} );
	} );
    wp.customize( 'portfolia_default_text_color', function( value ) {
		value.bind( function( to ) {
            $( 'p' ).css( {
                'color': to
            } );
		} );
	} );
} )( jQuery );
