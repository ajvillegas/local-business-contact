<?php

/**
 * Provide an admin area view for the meta boxes
 *
 * This file is used to markup the contact information meta box.
 *
 * @link       http://www.alexisvillegas.com
 * @since      1.0.0
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/admin/partials
 */

$schema = apply_filters( 'lbc_schema_list', array(
	'Organization'                => esc_html__( 'Organization', 'local-business-contact' ),
	'Corporation'                 => esc_html__( 'Corporation', 'local-business-contact' ),
	'EducationalOrganization'     => esc_html__( 'Educational Organization', 'local-business-contact' ),
	'GovernmentOrganization'      => esc_html__( 'Government Organization', 'local-business-contact' ),
	'LocalBusiness'               => esc_html__( 'Local Business', 'local-business-contact' ),
	'AnimalShelter'               => '- ' . esc_html__( 'Animal Shelter', 'local-business-contact' ),
	'AutomotiveBusiness'          => '- ' . esc_html__( 'Automotive Business', 'local-business-contact' ),
	'ChildCare'                   => '- ' . esc_html__( 'Child Care', 'local-business-contact' ),
	'DryCleaningOrLaundry'        => '- ' . esc_html__( 'Dry Cleaning or Laundry', 'local-business-contact' ),
	'EmergencyService'            => '- ' . esc_html__( 'Emergency Service', 'local-business-contact' ),
	'EmploymentAgency'            => '- ' . esc_html__( 'Employment Agency', 'local-business-contact' ),
	'EntertainmentBusiness'       => '- ' . esc_html__( 'Entertainment Business', 'local-business-contact' ),
	'FinancialService'            => '- ' . esc_html__( 'Financial Service', 'local-business-contact' ),
	'FoodEstablishment'           => '- ' . esc_html__( 'Food Establishment', 'local-business-contact' ),
	'GovernmentOffice'            => '- ' . esc_html__( 'Government Office', 'local-business-contact' ),
	'HealthAndBeautyBusiness'     => '- ' . esc_html__( 'Health and Beauty Business', 'local-business-contact' ),
	'HomeAndConstructionBusiness' => '- ' . esc_html__( 'Home and Construction Business', 'local-business-contact' ),
	'InternetCafe'                => '- ' . esc_html__( 'Internet Cafe', 'local-business-contact' ),
	'Library'                     => '- ' . esc_html__( 'Library', 'local-business-contact' ),
	'LodgingBusiness'             => '- ' . esc_html__( 'Lodging Business', 'local-business-contact' ),
	'MedicalOrganization'         => '- ' . esc_html__( 'Medical Organization', 'local-business-contact' ),
	'RadioStation'                => '- ' . esc_html__( 'Radio Station', 'local-business-contact' ),
	'RealEstateAgent'             => '- ' . esc_html__( 'Real Estate Agent', 'local-business-contact' ),
	'RecyclingCenter'             => '- ' . esc_html__( 'Recycling Center', 'local-business-contact' ),
	'SelfStorage'                 => '- ' . esc_html__( 'Self Storage', 'local-business-contact' ),
	'SportsActivityLocation'      => '- ' . esc_html__( 'Sports Activity Location', 'local-business-contact' ),
	'Store'                       => '- ' . esc_html__( 'Store', 'local-business-contact' ),
	'TouristInformationCenter'    => '- ' . esc_html__( 'Tourist Information Center', 'local-business-contact' ),
	'TravelAgency'                => '- ' . esc_html__( 'Travel Agency', 'local-business-contact' ),
	'NGO'                         => esc_html__( 'NGO', 'local-business-contact' ),
	'PerformingGroup'             => esc_html__( 'PerformingGroup', 'local-business-contact' ),
	'SportsTeam'                  => esc_html__( 'SportsTeam', 'local-business-contact' ),
) ); ?>

<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_schema_type' ); ?>"><?php esc_html_e( 'Schema Type', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<select class="regular-text" name="<?php echo $this->get_field_name( 'business_schema_type' ); ?>" id="<?php echo $this->get_field_id('business_schema_type'); ?>"> <?php
					foreach ( $schema as $value => $name ) {
						echo '<option value="' . esc_attr( $value ) . '" id="' . $value . '"', $this->get_field_value( 'business_schema_type' ) == $value ? ' selected="selected"' : '', '>', esc_html( $name ), '</option>';
					} ?>
				</select>
				<p>
					<span class="description"><?php echo sprintf( esc_html__( 'Select the %s type that best describes your business.', 'local-business-contact' ), '<a href="http://schema.org/docs/full.html" target="_blank">' . esc_html__( 'Schema.org' , 'local-business-contact' ) . '</a>' ); ?></span>
				</p>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_name' ); ?>" class="settings-label"><?php esc_html_e( 'Business Name', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_name' ); ?>" id="<?php $this->field_id( 'business_name' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_name' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_address' ); ?>" class="settings-label"><?php esc_html_e( 'Street Address', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<textarea class="regular-text" rows="4" cols="70" name="<?php $this->field_name( 'business_address' ); ?>" id="<?php $this->field_id( 'business_address' ); ?>"><?php echo esc_textarea( $this->get_field_value( 'business_address' ) ); ?></textarea>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_city' ); ?>" class="settings-label"><?php esc_html_e( 'City/Town', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_city' ); ?>" id="<?php $this->field_id( 'business_city' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_city' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_state' ); ?>" class="settings-label"><?php esc_html_e( 'State/Province', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_state' ); ?>" id="<?php $this->field_id( 'business_state' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_state' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_postcode' ); ?>" class="settings-label"><?php esc_html_e( 'Postcode', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_postcode' ); ?>" id="<?php $this->field_id( 'business_postcode' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_postcode' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_phone' ); ?>" class="settings-label"><?php esc_html_e( 'Business Phone', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_phone' ); ?>" id="<?php $this->field_id( 'business_phone' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_phone' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_fax' ); ?>" class="settings-label"><?php esc_html_e( 'Business Fax', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_fax' ); ?>" id="<?php $this->field_id( 'business_fax' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_fax' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_email' ); ?>" class="settings-label"><?php esc_html_e( 'Business Email', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'business_email' ); ?>" id="<?php $this->field_id( 'business_email' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'business_email' ) ); ?>" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'business_extra' ); ?>" class="settings-label"><?php esc_html_e( 'Additional Data', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<p style="margin-bottom: 10px;">
					<label for=<?php $this->field_id( 'business_extra_check' ); ?>>
						<input type="checkbox" name="<?php $this->field_name( 'business_extra_check' ); ?>" id="lbc-additional-data-check" value="1" <?php if ( $this->get_field_value( 'business_extra_check' ) ) checked( $this->get_field_value( 'business_extra_check' ), 1 ); ?> />
						<?php esc_html_e( 'Enable additional data?', 'local-business-contact' ); ?>
					</label>
				</p>
				<div id="lbc-additional-data">
					<textarea class="medium-text" rows="8" cols="70" name="<?php $this->field_name( 'business_extra' ); ?>" id="<?php $this->field_id( 'business_extra' ); ?>"><?php echo wp_kses_post( $this->get_field_value( 'business_extra' ) ); ?></textarea>
					<p>
						<span class="description"><?php esc_html_e( 'Use this field to add any additional information you want to display under the contact details. Accepts basic HTML and shortcodes.', 'local-business-contact' ); ?></span>
					</p>
				</div>
			</td>
		</tr>
	</tbody>
</table>
