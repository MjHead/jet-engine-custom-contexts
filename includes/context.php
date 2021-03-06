<?php
namespace JE_CC;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Setup and process context
 */
class Context {

	public function __construct() {

		$taxes = Plugin::instance()->config->get();

		if ( ! empty( $taxes ) ) {

			foreach ( $taxes as $tax ) {
				add_filter( 'jet-engine/listings/data/object-by-context/custom_tax_' . $tax->name, array( $this, 'set_context' ) );
			}

			add_filter( 'jet-engine/listings/allowed-context-list', array( $this, 'register_context' ) );

		}

	}

	/**
	 * Register taxonomies context
	 *
	 * @param  [type] $context [description]
	 * @return [type]          [description]
	 */
	public function register_context( $context ) {

		$taxes = Plugin::instance()->config->get();

		foreach ( $taxes as $tax ) {
			$label = ! empty( $tax->labels->singular_name ) ? $tax->labels->singular_name : $tax->labels->name;
			$context[ 'custom_tax_' . $tax->name ] = 'Current ' . $label;
		}

		return $context;

	}

	/**
	 * Setup current context object
	 */
	public function set_context() {

		$filter = current_filter();
		$tax = str_replace( 'jet-engine/listings/data/object-by-context/custom_tax_', '', $filter );
		$post_id = get_the_ID();

		if ( ! $tax || ! $post_id ) {
			return;
		}

		$terms = wp_get_post_terms( $post_id, $tax );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

			foreach ( $terms as $term ) {
				// Return the first found parent term of the post terms
				if ( ! $term->parent ) {
					return $term;
				}
			}

			// If post terms is only child terms - return first found term
			return $terms[0];

		}

	}

}
