/**
 * The TinyMCE functionality of the plugin.
 *
 * Adds a new button to the TinyMCE editor for inserting
 * the local business contact shortcode.
 *
 * @since    1.0.0
 */

(function() {
	
    tinymce.PluginManager.add( 'lbc_business_contact', function( editor, url ) {
	    
        editor.addButton( 'lbc_business_contact', {
            title: 'Insert Business Contact',
            type: 'button',
            icon: 'icon dashicons-businessman',
            onclick: function() {
				editor.insertContent( '[local-business-contact name=1 address=1 phone=1 fax=1 email=1 extra=1 hours=1]' );
			}
        } );
        
    } );
    
} )();
