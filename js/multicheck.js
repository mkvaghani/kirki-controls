/* global wp, _, kirki */
wp.customize.controlConstructor['kirki-multicheck'] = wp.customize.kirkiDynamicControl.extend( {

	initKirkiControl: function() {

		var control = this;

		control.container.html( kirki.control.template.multicheckControl( control ) );

		// Save the value
		control.container.on( 'change', 'input', function() {
			var value = [],
			    i = 0;

			// Build the value as an object using the sub-values from individual checkboxes.
			jQuery.each( control.params.choices, function( key ) {
				if ( control.container.find( 'input[value="' + key + '"]' ).is( ':checked' ) ) {
					value[ i ] = key;
					i++;
				}
			} );

			// Update the value in the customizer.
			control.setting.set( value );
		} );
	}
} );
