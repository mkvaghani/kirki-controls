/* global wp, _, kirki */
wp.customize.controlConstructor['kirki-color-palette'] = wp.customize.kirkiDynamicControl.extend( {

	getHTML: function( control ) {
		return kirki.template.colorPaletteControl( control );
	}
} );
