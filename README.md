# Local Business Contact

Display business contact information and operating hours with proper [Schema.org](http://schema.org/) markup when using the Genesis Framework.

**Contributors**: [ajvillegas](http://profiles.wordpress.org/ajvillegas)  
**Tags**: [address](http://wordpress.org/plugins/tags/address), [seo](http://wordpress.org/plugins/tags/seo), [local seo](http://wordpress.org/plugins/tags/local-seo), [schema](http://wordpress.org/plugins/tags/schema), [genesis](http://wordpress.org/plugins/tags/genesis)  
**Requires at least**: 4.5  
**Tested up to**: 4.8  
**Stable tag**: 1.0.0  
**License**: [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html)

# Description

This plugin makes it easy to manage and display your business contact information and operating hours with proper SEO-friendly [Schema.org](http://schema.org/) markup. **Requires the Genesis Framework**.

It outputs clean, semantic HTML in the front-end with no styling to make it easy for you to integrate into your theme.

You can display all or individual sections on your website using the `[local-business-contact]` shortcode, as well as the 'Business Contact' widget.

**Schema Types**

The Schema Type select option let's you specify your type of business so search engines can index it accordingly. If you can't find an option that best describes your business you can default to a more generic option such as 'Local Business', or add an option to the list using the `lbc_schema_list` filter.

The example below demonstrates how you can implement this filter on your theme:

```php
add_filter( 'lbc_schema_list', 'myprefix_add_schema_types' );
/**
 * Filter to add extra schema types to the schema select option.
 *
 * @param   array   An array containing default values.
 * @return  array   An array containing new values.
 */
function myprefix_add_schema_types( $schema ) {
	
    // Add new schema types to array
    $new_schema = array(
        'GardenStore' => esc_html__( 'Garden Store', 'my-text-domain' ),
        'ComputerStore' => esc_html__( 'Computer Store', 'my-text-domain' ),
    );
	
    // Combine the two arrays
    $schema = array_merge( $new_schema, $schema );
	
    return $schema;
	
}
```

For more information and a complete list of schema types, please refer to this page: [Schema Types](http://schema.org/docs/full.html)

**Import/Export**

Local Business Contact fully integrates with the Genesis built-in import/export functionality so you can easily backup your settings.

To export your business settings, simply go to Genesis > Import/Export and select the 'Business Settings' checkbox and Genesis will generate a `.json` file with all your data. To import back into your website, choose the previously generated file and click on the 'Upload File and Import' button.

# Installation

**Using The WordPress Dashboard**

1. Navigate to the 'Add New' Plugin Dashboard
2. Click on 'Upload Plugin' and select `local-business-contact.zip` from your computer
3. Click on 'Install Now'
4. Activate the plugin on the WordPress Plugins Dashboard

**Using FTP**

1. Extract `local-business-contact.zip` to your computer
2. Upload the `local-business-contact` directory to your `wp-content/plugins` directory
3. Activate the plugin on the WordPress Plugins Dashboard

# Screenshots

*Local Business Settings*

![Local Business Settings](wp-assets/screenshot-1.png?raw=true)

*Business Contact widget*

![Business Contact widget](wp-assets/screenshot-2.png?raw=true)

# Changelog

**1.0.0**
* Initial release.
