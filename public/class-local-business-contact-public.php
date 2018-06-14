<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.alexisvillegas.com
 * @since      1.0.0
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the 'local-business-contact' shortcode.
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/public
 * @author     Alexis J. Villegas <alexis@ajvillegas.com>
 */
class Local_Business_Contact_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name		The name of this plugin.
	 * @param    string    $version			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register shortcodes.
	 *
	 * @since    1.0.0
	 */
	public function register_shortcodes() {
		
		// Testimonials shortcode
		add_shortcode( 'local-business-contact', array( $this, 'display_contact_info' ) );
		
	}
	
	/**
	 * Define the local business contact shortcode.
	 *
	 * @since    1.0.0
	 */
	public function display_contact_info( $atts ) {
		
		// Check for Genesis to avoid any errors if deactivated
		if ( !class_exists( 'Genesis_Admin_Boxes' ) ) {
			return;
		}
		
		ob_start();
		
		// Define custom content filters
		add_filter( 'lbc_additional_data_content', 'wptexturize' );
		add_filter( 'lbc_additional_data_content', 'convert_smilies', 20 );
		add_filter( 'lbc_additional_data_content', 'wpautop' );
		add_filter( 'lbc_additional_data_content', 'shortcode_unautop' );
		add_filter( 'lbc_additional_data_content', 'do_shortcode', 11 );
		
		// Define attributes and default values
		$atts = shortcode_atts( array(
			'name'    => 1,
	        'address' => 1,
	        'phone'   => 1,
	        'fax'     => 1,
	        'email'   => 1,
	        'extra'   => 1,
	        'hours'   => 1,
	    ), $atts, 'local-business-contact' );
	    
	    // Get settings options
	    $schema = genesis_get_option( 'business_schema_type', 'local-business-settings' );
	    $name = genesis_get_option( 'business_name', 'local-business-settings' );
	    $address = genesis_get_option( 'business_address', 'local-business-settings' );
		$city = genesis_get_option( 'business_city', 'local-business-settings' );
		$state = genesis_get_option( 'business_state', 'local-business-settings' );
		$postcode = genesis_get_option( 'business_postcode', 'local-business-settings' );
		$phone = genesis_get_option( 'business_phone', 'local-business-settings' );
		$fax = genesis_get_option( 'business_fax', 'local-business-settings' );
		$email = genesis_get_option( 'business_email', 'local-business-settings' );
		$extra_check = genesis_get_option( 'business_extra_check', 'local-business-settings' );
		$extra = genesis_get_option( 'business_extra', 'local-business-settings' );
		$hours_heading = genesis_get_option( 'hours_heading', 'local-business-settings' );
		$monday_from = genesis_get_option( 'hours_monday_from', 'local-business-settings' );
		$monday_to = genesis_get_option( 'hours_monday_to', 'local-business-settings' );
		$tuesday_from = genesis_get_option( 'hours_tuesday_from', 'local-business-settings' );
		$tuesday_to = genesis_get_option( 'hours_tuesday_to', 'local-business-settings' );
		$wednesday_from = genesis_get_option( 'hours_wednesday_from', 'local-business-settings' );
		$wednesday_to = genesis_get_option( 'hours_wednesday_to', 'local-business-settings' );
		$thursday_from = genesis_get_option( 'hours_thursday_from', 'local-business-settings' );
		$thursday_to = genesis_get_option( 'hours_thursday_to', 'local-business-settings' );
		$friday_from = genesis_get_option( 'hours_friday_from', 'local-business-settings' );
		$friday_to = genesis_get_option( 'hours_friday_to', 'local-business-settings' );
		$saturday_from = genesis_get_option( 'hours_saturday_from', 'local-business-settings' );
		$saturday_to = genesis_get_option( 'hours_saturday_to', 'local-business-settings' );
		$sunday_from = genesis_get_option( 'hours_sunday_from', 'local-business-settings' );
		$sunday_to = genesis_get_option( 'hours_sunday_to', 'local-business-settings' );
		
		if ( ( $name && 1 == $atts['name'] )
			|| ( $address && 1 == $atts['address'] )
			|| ( $phone && 1 == $atts['phone'] )
			|| ( $fax && 1 == $atts['fax'] )
			|| ( $email && 1 == $atts['email'] )
			|| ( $extra && 1 == $extra_check && 1 == $atts['extra'] )
			|| ( 1 == $atts['hours'] ) ) { ?>
			
			<div itemscope itemtype="http://schema.org/<?php echo $schema; ?>" class="lbc-business-info">
				<div class="lbc-business-contact"> <?php
					
				if ( $name && 1 == $atts['name'] ) { ?>
					<div itemprop="legalName" class="lbc-business-name"><?php echo $name; ?></div> <?php
				}
				
				if ( $address && 1 == $atts['address'] ) { ?>
					<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="lbc-business-address">
						<span class="lbc-address-label">
							<?php echo esc_html( apply_filters( 'lbc_filter_address_label', __( 'Address:', 'local-business-contact' ) ) ) . ' '; ?>
						</span>
						<div class="address-wrap">
							<div itemprop="streetAddress" class="lbc-address-street"><?php echo nl2br( esc_html( $address ) ) . ' '; ?></div> <?php
						if ( $city ) { ?>
							<span itemprop="addressLocality" class="lbc-address-city"><?php echo esc_html( $city ) . ' '; ?></span> <?php
						}
						if ( $state ) { ?>
							<span itemprop="addressRegion" class="lbc-address-region"><?php echo esc_html( $state ) . ' '; ?></span> <?php
						}
						if ( $postcode ) { ?>
							<span itemprop="postalCode" class="lbc-address-postcode"><?php echo esc_html( $postcode ); ?></span> <?php
						} ?>
						</div>
					</div> <?php
				}
				
				if ( $phone && 1 == $atts['phone'] ) { ?>
					<div itemprop="telephone" class="lbc-business-phone">
						<span class="lbc-phone-label">
							<?php echo esc_html( apply_filters( 'lbc_filter_phone_label', __( 'Tel:', 'local-business-contact' ) ) ) . ' '; ?>
						</span>
						<a href="tel:<?php echo esc_html( preg_replace( '/[^0-9+]/', '', apply_filters( 'lbc_filter_phone_uri', $phone ) ) ); ?>"><?php echo esc_html( $phone ); ?></a>
					</div> <?php
				}
				
				if ( $fax && 1 == $atts['fax'] ) { ?>
					<div itemprop="faxNumber" class="lbc-business-fax">
						<span class="lbc-fax-label">
							<?php echo esc_html( apply_filters( 'lbc_filter_fax_label', __( 'Fax:', 'local-business-contact' ) ) ) . ' '; ?>
						</span>
						<a href="fax:<?php echo esc_html( preg_replace( '/[^0-9+]/', '', apply_filters( 'lbc_filter_fax_uri', $fax ) ) ); ?>"><?php echo esc_html( $fax ); ?></a>
					</div> <?php
				}
				
				if ( $email && 1 == $atts['email'] ) { ?>
					<div itemprop="email" class="lbc-business-email">
						<span class="lbc-email-label">
							<?php echo esc_html( apply_filters( 'lbc_filter_email_label', __( 'Email:', 'local-business-contact' ) ) ) . ' '; ?>
						</span>
						<a href="mailto:<?php echo esc_html( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a>
					</div> <?php
				}
				
				if ( $extra && 1 == $extra_check && 1 == $atts['extra'] ) { ?>
					<div class="lbc-additional-data">
						<?php echo apply_filters( 'lbc_additional_data_content', wp_kses_post( $extra ) ); ?>
					</div> <?php
				}
				
				if ( 1 == $atts['hours']
					&& ( 'closed' !== $monday_from
						|| 'closed' !== $tuesday_from
						|| 'closed' !== $wednesday_from
						|| 'closed' !== $thursday_from
						|| 'closed' !== $friday_from
						|| 'closed' !== $saturday_from
						|| 'closed' !== $sunday_from ) ) { ?>
						
					<div class="lbc-business-hours"> <?php
						
					if ( $hours_heading ) { ?>
						<h4 class="lbc-hours-heading"><?php echo $hours_heading; ?></h4> <?php
					} ?>
						
						<table class="table lbc-hours-table">
							<tbody> <?php
								
							if ( 'closed' == $monday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Monday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $monday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Monday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="Mo <?php echo date( 'H:i', strtotime( $monday_from ) ) . '-' . date( 'H:i', strtotime( $monday_to ) ); ?>"><?php echo $monday_from . ' - ' . $monday_to; ?></time>
									</td>
								</tr> <?php
							}
							
							if ( 'closed' == $tuesday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Tuesday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $tuesday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Tuesday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="Tu <?php echo date( 'H:i', strtotime( $tuesday_from ) ) . '-' . date( 'H:i', strtotime( $tuesday_to ) ); ?>"><?php echo $tuesday_from . ' - ' . $tuesday_to; ?></time>
									</td>
								</tr> <?php
							}
							
							if ( 'closed' == $wednesday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Wednesday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $wednesday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Wednesday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="We <?php echo date( 'H:i', strtotime( $wednesday_from ) ) . '-' . date( 'H:i', strtotime( $wednesday_to ) ); ?>"><?php echo $wednesday_from . ' - ' . $wednesday_to; ?></time>
									</td>
								</tr> <?php
							}
							
							if ( 'closed' == $thursday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Thursday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $thursday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Thursday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="Th <?php echo date( 'H:i', strtotime( $thursday_from ) ) . '-' . date( 'H:i', strtotime( $thursday_to ) ); ?>"><?php echo $thursday_from . ' - ' . $thursday_to; ?></time>
									</td>
								</tr> <?php
							}
							
							if ( 'closed' == $friday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Friday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $friday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Friday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="Fr <?php echo date( 'H:i', strtotime( $friday_from ) ) . '-' . date( 'H:i', strtotime( $friday_to ) ); ?>"><?php echo $friday_from . ' - ' . $friday_to; ?></time>
									</td>
								</tr> <?php
							}
							
							if ( 'closed' == $saturday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Saturday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $saturday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Saturday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="Sa <?php echo date( 'H:i', strtotime( $saturday_from ) ) . '-' . date( 'H:i', strtotime( $saturday_to ) ); ?>"><?php echo $saturday_from . ' - ' . $saturday_to; ?></time>
									</td>
								</tr> <?php
							}
							
							if ( 'closed' == $sunday_from ) { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Sunday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours"><?php echo ucfirst( $sunday_from ); ?></td>
								</tr> <?php
							} else { ?>
								<tr>
									<td class="lbc-day"><?php esc_html_e( 'Sunday', 'local-business-contact' ); ?></td>
									<td class="lbc-hours">
										<time itemprop="openingHours" datetime="Su <?php echo date( 'H:i', strtotime( $sunday_from ) ) . '-' . date( 'H:i', strtotime( $sunday_to ) ); ?>"><?php echo $sunday_from . ' - ' . $sunday_to; ?></time>
									</td>
								</tr> <?php
							} ?>
							
							</tbody>
						</table>
					</div> <?php
						
				} ?>
				
				</div>
			</div> <?php
			
		}
	    
	    $html = ob_get_clean();
			
		return $html;
		
	}

}
