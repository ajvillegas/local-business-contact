/**
 * The admin-facing JavaScript functionality.
 *
 * Shows or hides sections of the settings meta boxes
 * depending on selected options.
 *
 * @since	1.0.0
 *
 */
 
(function( $ ) {

	$( document ).ready( function() {
		
		// Toggle additional data
	    $( '#lbc-additional-data-check' ).on( 'change', function() {
	        $( '#lbc-additional-data' ).toggle( $( '#lbc-additional-data-check' ).prop( 'checked' ) );
	    } ).trigger( 'change' );
		
		// Toggle business hours
	    $( '#lbc-monday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-monday .lbc_hours_to' ).toggle( $( '#lbc-monday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
	    
	    $( '#lbc-tuesday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-tuesday .lbc_hours_to' ).toggle( $( '#lbc-tuesday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
	    
	    $( '#lbc-wednesday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-wednesday .lbc_hours_to' ).toggle( $( '#lbc-wednesday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
	    
	    $( '#lbc-thursday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-thursday .lbc_hours_to' ).toggle( $( '#lbc-thursday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
	    
	    $( '#lbc-friday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-friday .lbc_hours_to' ).toggle( $( '#lbc-friday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
	    
	    $( '#lbc-saturday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-saturday .lbc_hours_to' ).toggle( $( '#lbc-saturday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
	    
	    $( '#lbc-sunday .lbc_hours_from' ).on( 'change', function() {
	        $( '#lbc-sunday .lbc_hours_to' ).toggle( $( '#lbc-sunday .lbc_hours_from' ).val() !== 'closed' );
	    } ).trigger( 'change' );
		
	} );

} ) ( jQuery );
