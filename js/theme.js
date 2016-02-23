( function( $ ) {

	$( window ).scroll( function() {

		if ( $( window ).width() < 960 ) {

			return false;

		}

		$( '.header-image-caption' ).css( {
			'opacity': ( 1 - $( this ).scrollTop() / $( '.header-image' ).outerHeight() )
		} );

	} );

} )( jQuery );
