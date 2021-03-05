<?php
namespace JE_CC;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Configuration class
 */
class Config {

	private $taxes = array();

	public function __construct() {
		do_action( 'jet-engine-custom-context', $this );
	}

	public function add_tax( $taxonomy = null ) {

		$taxonomy_object = get_taxonomy( $taxonomy );

		if ( ! $taxonomy_object ) {
			return;
		}

		$this->taxes[] = $taxonomy_object;

	}

	public function get() {
		return $this->taxes;
	}

}
