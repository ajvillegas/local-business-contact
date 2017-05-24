<?php

/**
 * Provide an admin area view for the meta boxes
 *
 * This file is used to markup the business hours meta box.
 *
 * @link       http://www.alexisvillegas.com
 * @since      1.0.0
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/admin/partials
 */

$options = array( '12:00 am', '12:15 am', '12:30 am', '12:45 am', '1:00 am', '1:15 am', '1:30 am', '1:45 am', '2:00 am', '2:15 am', '2:30 am', '2:45 am', '3:00 am', '3:15 am', '3:30 am', '3:45 am', '4:00 am', '4:15 am', '4:30 am', '4:45 am', '5:00 am', '5:15 am', '5:30 am', '5:45 am', '6:00 am', '6:15 am', '6:30 am', '6:45 am', '7:00 am', '7:15 am', '7:30 am', '7:45 am', '8:00 am', '8:15 am', '8:30 am', '8:45 am', '9:00 am', '9:15 am', '9:30 am', '9:45 am', '10:00 am', '10:15 am', '10:30 am', '10:45 am', '11:00 am', '11:15 am', '11:30 am', '11:45 am', '12:00 pm', '12:15 pm', '12:30 pm', '12:45 pm', '1:00 pm', '1:15 pm', '1:30 pm', '1:45 pm', '2:00 pm', '2:15 pm', '2:30 pm', '2:45 pm', '3:00 pm', '3:15 pm', '3:30 pm', '3:45 pm', '4:00 pm', '4:15 pm', '4:30 pm', '4:45 pm', '5:00 pm', '5:15 pm', '5:30 pm', '5:45 pm', '6:00 pm', '6:15 pm', '6:30 pm', '6:45 pm', '7:00 pm', '7:15 pm', '7:30 pm', '7:45 pm', '8:00 pm', '8:15 pm', '8:30 pm', '8:45 pm', '9:00 pm', '9:15 pm', '9:30 pm', '9:45 pm', '10:00 pm', '10:15 pm', '10:30 pm', '10:45 pm', '11:00 pm', '11:15 pm', '11:30 pm', '11:45 pm' ); ?>
		
<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label for="<?php $this->field_id( 'hours_heading' ); ?>" class="settings-label"><?php esc_html_e( 'Heading', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" name="<?php $this->field_name( 'hours_heading' ); ?>" id="<?php $this->field_id( 'hours_heading' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'hours_heading' ) ); ?>" />
			</td>
		</tr>
		
		<tr id="lbc-monday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Monday" class="bh-label"><?php esc_html_e( 'Monday', 'local-business-contact' ); ?></label>
			</th>
			<td style="padding-bottom: 5px;">
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_monday_from' ); ?>" id="<?php echo $this->get_field_id('hours_monday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_monday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name( 'hours_monday_to' ); ?>" id="<?php echo $this->get_field_id( 'hours_monday_to' ); ?>"> <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_monday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
		
		<tr id="lbc-tuesday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Tuesday" class="bh-label"><?php esc_html_e( 'Tuesday', 'local-business-contact' ); ?></label>
			</th>
			<td style="padding-bottom: 5px;">
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_tuesday_from' ); ?>" id="<?php echo $this->get_field_id('hours_tuesday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_tuesday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name( 'hours_tuesday_to' ); ?>" id="<?php echo $this->get_field_id( 'hours_tuesday_to' ); ?>"> <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_tuesday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
		
		<tr id="lbc-wednesday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Wednesday" class="bh-label"><?php esc_html_e( 'Wednesday', 'local-business-contact' ); ?></label>
			</th>
			<td style="padding-bottom: 5px;">
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_wednesday_from' ); ?>" id="<?php echo $this->get_field_id('hours_wednesday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_wednesday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name('hours_wednesday_to'); ?>" id="<?php echo $this->get_field_id( 'hours_wednesday_to' ); ?>"> <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_wednesday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
		
		<tr id="lbc-thursday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Thursday" class="bh-label"><?php esc_html_e( 'Thursday', 'local-business-contact' ); ?></label>
			</th>
			<td style="padding-bottom: 5px;">
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_thursday_from' ); ?>" id="<?php echo $this->get_field_id('hours_thursday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_thursday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name( 'hours_thursday_to' ); ?>" id="<?php echo $this->get_field_id( 'hours_thursday_to' ); ?>"> <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_thursday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
		
		<tr id="lbc-friday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Friday" class="bh-label"><?php esc_html_e( 'Friday', 'local-business-contact' ); ?></label>
			</th>
			<td style="padding-bottom: 5px;">
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_friday_from' ); ?>" id="<?php echo $this->get_field_id('hours_friday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_friday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name( 'hours_friday_to' ); ?>" id="<?php echo $this->get_field_id( 'hours_friday_to' ); ?>"> <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_friday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
		
		<tr id="lbc-saturday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Saturday" class="bh-label"><?php esc_html_e( 'Saturday', 'local-business-contact' ); ?></label>
			</th>
			<td style="padding-bottom: 5px;">
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_saturday_from' ); ?>" id="<?php echo $this->get_field_id('hours_saturday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_saturday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name( 'hours_saturday_to' ); ?>" id="<?php echo $this->get_field_id( 'hours_saturday_to' ); ?>"> <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_saturday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
		
		<tr id="lbc-sunday" valign="top">
			<th scope="row" style="padding-bottom: 10px;">
				<label for="Sunday" class="bh-label"><?php esc_html_e( 'Sunday', 'local-business-contact' ); ?></label>
			</th>
			<td>
				<select class="lbc_hours_from" name="<?php echo $this->get_field_name( 'hours_sunday_from' ); ?>" id="<?php echo $this->get_field_id('hours_sunday_from'); ?>">
					<option value="closed"><?php esc_html_e( 'Closed', 'local-business-contact' ) ?></option> <?php
					foreach ( $options as $option ) {
						echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_sunday_from' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
					} ?>
				</select>
				<span class="lbc_hours_to">
					- <select name="<?php echo $this->get_field_name( 'hours_sunday_to' ); ?>" id="<?php echo $this->get_field_id( 'hours_sunday_to' ); ?>">  <?php
						foreach ( $options as $option ) {
							echo '<option value="' . esc_attr( $option ) . '" id="' . $option . '"', $this->get_field_value( 'hours_sunday_to' ) == $option ? ' selected="selected"' : '', '>', esc_html( $option ), '</option>';
						} ?>
					</select>
				</span>
			</td>
		</tr>
	</tbody>
</table>
