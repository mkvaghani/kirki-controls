<?php
/**
 * Customizer Control: kirki-select.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Select control.
 */
class Kirki_Control_Select extends Kirki_Control_Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-select';

	/**
	 * Maximum number of options the user will be able to select.
	 * Set to 1 for single-select.
	 *
	 * @access public
	 * @var int
	 */
	public $multiple = 1;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		wp_enqueue_script( 'kirki-dynamic-control', Kirki_Controls_Bootstrap::get_url( 'assets/js/dynamic-control.js' ), array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_script( 'kirki-select', Kirki_Controls_Bootstrap::get_url( 'assets/js/select.js' ), array( 'jquery', 'customize-base', 'kirki-dynamic-control', 'select2', 'jquery-ui-sortable' ), false, true );
		wp_enqueue_style( 'kirki-styles', Kirki_Controls_Bootstrap::get_url( 'assets/styles.css' ), null );
		wp_enqueue_script( 'select2', Kirki_Controls_Bootstrap::get_url( 'assets/vendor/select2/js/select2.full.js' ), array( 'jquery' ), '4.0.3', true );
		wp_enqueue_style( 'select2', Kirki_Controls_Bootstrap::get_url( 'assets/vendor/select2/css/select2.css' ), array(), '4.0.3' );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();
		$this->json['multiple'] = $this->multiple;
	}
}
